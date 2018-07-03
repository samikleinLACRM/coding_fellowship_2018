<?php


function echoHeader($Title, $PageName) {

	?>
	<script src="/include/jquery.js"></script>
	<!-- <script type='text/javascript'> -->
	<?php

	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Quicksand'>
			<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
		</head>

";
?>

<script type='text/javascript'>

function jsUpVote(eventID){

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber+1;
	console.log("after you voted = " +(pureNumber+1));

	//call ajax
	$.ajax({ url:'/ajax/ajaxUp.php', data:{eventID}});
}


function jsDownVote(eventID){

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber-1;
	console.log("after you voted = " +(pureNumber-1));

	//call ajax
	$.ajax({ url:'/ajax/ajaxDown.php', data:{eventID}});

}
</script>

<?php

echo"

		<body class='background'>

			";
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

	echo date_format($dateFromMySQL, 'g:ia \o\n l jS F Y');
#output: 5:45pm on Saturday 24th March 2012


}

function echoNavBar(){
	echo "
	<div class='textStyle form'>
		<a href='trendingEvents.php'>Trending Events</a> ||
		<a href='logInMenuEP.php'>Log In Menu</a> ||
		<a href='accountPage.php'>Profile</a> ||
		<a href='createEvent.php'>Create Event</a>
	</div>
	";
}



//
// function echoFooter(){
// 	echo "
// 		<div class='row right footer'>
// 			Sami Klein <br>
// 			email: sami.klein@wustl.edu <br>
// 		</div>
// </body>
// 	";
// }
//
//
function echoNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}
//
//
// function echoJustDate($date){
// 	$timestamp = strtotime($date);
// 	$realDate = date('d-m-Y', $timestamp);
// 	return $realDate;
// }


?>
