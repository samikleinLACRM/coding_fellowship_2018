<?php


function echoHeader($Title, $PageName) {

	?>
	<script src="/include/jquery.js"></script>
	<script src="/include/jsFunctions.js"></script>
	<?php


	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Quicksand'>
			<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
		</head>

		<body class='background'>";
			echoNavBar();
			if ($PageName!=null) {
				echo "
				<br>
				<div class='bloghead'>
					$PageName
				</div>
				";
			}
}



function wrongPage($message){
	echoHeader("Wrong Page!", "Wrong Page!");
	echo "<p class='textStyle' style='text-align:center'>Oops! 404 Error. You've reached the wrong page. $message <p>";
	// echoFooter();
	die("");
}



function echoDate($dateFromMySQL){

	// echo date_format($dateFromMySQL, 'g:ia \o\n l jS F Y');
#output: 5:45pm on Saturday 24th March 2012

	// date_default_timezone_set('UTC');
	// echo date($dateFromMySQL);
	echo date("F j, Y", strtotime( $dateFromMySQL ));

	// $time=strtotime($dateFromMySQL);
	// $month=date("F",$time);
	// $year=date("Y",$time);
	// $timestamp = strtotime($dateFromMySQL);
	// $realDate = date('d/m/Y', $timestamp);
 	// echo $realDate;
	// echo $month + $year;

}

function formatDateToCalculate($dateFromMySQL){
	$toReturn = date("F j, Y", strtotime( $dateFromMySQL ));
	return $toReturn;
}

//
//
// function echoJustDate($date){
// 	$timestamp = strtotime($date);
// 	$realDate = date('d-m-Y', $timestamp);
// 	return $realDate;
// }

function echoNavBar(){
	echo "
	<div class='textStyle form'>
		<a href='index.php'>Trending Events</a> ||
		<a href='logInMenuEP.php'>Log In Menu</a> ||
		<a href='accountPage.php?userID=".@$_SESSION['userID']."'>Profile</a> ||
		<a href='createEvent.php'>Create Event</a>
	</div>
	";
}

function echoNotLoggedIn($message){
	echo "
	<div class= 'textStyle form'>
		Sorry! $message Please log in here:
		<br><br>
		<a href='logInEP.php'>Log In</a>
	</div>
	";
}

function checkIfUserIsLoggedIn($sessionUserID){
	if(!isset($sessionUserID)) {
		echoNotLoggedIn("You must be logged in to vote.");
		die();
	}
}




function echoFooter(){
	echo "
	<br><br><br>
		<div class='row footer'>
			Events Project <br>
			By: Sami Klein <br>
			email: sami.klein@wustl.edu
		</div>
</body>
	";
}


function echoNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}


function echoDialogBox(){
	echo "

	<div id='dialogoverlay'><div>
	<div id='dialogbox'>
		<div>
			<div id='DBhead'></div>
			<div id='DBbody'></div>
			<div id='DBfoot'></div>
		</div>
	</div>
	";
}

function echo3EventsGoingTo($userID){

	// if(){ //something w doc.getbyel? or need another parameter
	//
	// }
	// $eventsGoingTo=getAllEventsThisUserIsGoingTo($userID);
	$eventsGoingTo=get3EventsUserGoingTo($userID);

	if ($eventsGoingTo == null) {
		echo "Going to 0 events";
	}
	else {
		foreach ($eventsGoingTo as $event) {
		// var_dump($event);
		echo "
		<div class='row accountColumn' style='border:solid; border-color: gray;'>";

		echoEvent($event);
		echo "
		</div><br>";
		}
	}
}

function echoAllEventsGoingTo($userID){

	$eventsGoingTo=getAllEventsThisUserIsGoingTo($userID);

	if ($eventsGoingTo == null) {
		echo "Going to 0 events";
	}
	else {
		foreach ($eventsGoingTo as $event) {
		echo "
		<div class='row accountColumn' style='border:solid; border-color: gray;'>";

		echoEvent($event);
		echo "
		</div><br>";
		}
	}
}


function echoAllEventsCreated($userID){

	$eventsCreated=getAllEventsCreated($userID);
	if ($eventsCreated == null) {
		echo "0 events created";
	}
	else{
		foreach ($eventsCreated as $event) {
			// var_dump($event);
			echo "
			<div class='row accountColumn' style='border:solid; border-color: gray;'>";
			echoEvent($event);
			echo "</div> <br>";
		}
	}
}


function echo3EventsCreated($userID){
	$eventsCreated=get3EventsCreated($userID);
	if ($eventsCreated == null) {
		echo "0 events created";
	}
	else{
		foreach ($eventsCreated as $event) {
			// var_dump($event);
			echo "
			<div class='row accountColumn' style='border:solid; border-color: gray;'>";
			echoEvent($event);
			echo "</div> <br>";
		}
	}
}




function echoColumnEvent($eventID){
	$thisEvent=getOneEvent($eventID);
	echo "
	<div class='trendingColumn'>";
		echoEvent($thisEvent);
	echo "
	</div>";
}

function echoColumnTwoEvent($eventID){
	$thisEvent=getOneEvent($eventID);
	echo "<div class='trendingColumn' style='margin-left:5%; margin-right:5%;'>";
		echoEvent($thisEvent);
	echo "
	</div>";
}

// $direction = "up";
function echoUpVoteButton($eventID, $upVoted){
	$direction = 'up'; //nic fixed this. very weird string stuff, but it works now!
	if(!isset($_SESSION['userID'])){
		$s = null;
	}
	else{
		$s = $_SESSION['userID'];
	}
	echo"
	<a href='javascript://' onclick=\"intakeVote($eventID, '$direction', $s);\">
		<img id='upVoteButton_$eventID' class='iconAligned $upVoted' src='/pics/arrow2.jpg' alt='arrow' height=40px>
	</a>";

}

function echoDownVoteButton($eventID, $downVoted){ //sohuld there be a ; after the function?
	$direction = 'down';
	if(!isset($_SESSION['userID'])){
		$s = null;
	}
	else{
		$s = $_SESSION['userID'];
	}
	echo"
	<a href='javascript://' onclick=\"intakeVote($eventID, '$direction', $s);\">
		<img id='downVoteButton_$eventID' class='iconAligned $downVoted' src='/pics/line2.jpg' alt='line' height=40px>
	</a>";
}



function echoEvent($event){
	$eventID=$event['eventID'];
	$upVoted = null;
	$downVoted= null;
	if(isset($_SESSION['userID'])){
		$vote = doesUserVoteExist($eventID, $_SESSION['userID']);
		if ($vote !=null){
			if ($vote['0']['direction'] == "up"){
				$upVoted="voted";
			}
			else{ //which means that direction must be down
				$downVoted="voted";
			}
		}
	}


	echo"
		<div class='voteColumn'>
			<br>";
			echoUpVoteButton($eventID, $upVoted);

			echo "
			<br><br>
			<div id='eventWrapper_$eventID'>
				$event[votes]
			</div>
			<br>
			";
			echoDownVoteButton($eventID, $downVoted);
			echo "
		</div>

		<div class='bodyColumn'>
			<a href='singleEventPage.php?eventID=$eventID'>
				<h2 style='border:solid; margin:5px;'>$event[name]</h2>
				<p>"; echoDate($event['dateOfEvent']);echo"</p>
				<p>$event[location]</p>
				<p><strong>Come Bc:</strong> $event[comeBc]</p>
			</a>
		</div>
	";
}



?>
