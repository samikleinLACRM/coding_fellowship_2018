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
