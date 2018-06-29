<?php


function echoHeader($Title, $PageName) {

	?>
	<script src="/include/jquery.js"></script>
	<!-- <script type='text/javascript'> -->
	<?php

	//Wait for the page to load first
		// window.onload = function() {
		//
		// 	//Get a reference to the link on the page
		// 	// with an id of "mylink"
		//
		// 	var upVoting = document.getElementById("upVoting");
		//
        //      //Set code to run when the link is clicked
        //      // by assigning a function to "onclick"
        //      upVoting.onclick = function() {
		//
        //        // Your code here...
		// 	   upVoteNumber($myEventVotes, $eventID);
		//
        //        //If you don't want the link to actually
        //        // redirect the browser to another page,
        //        // "google.com" in our example here, then
        //        // return false at the end of this block.
        //        // Note that this also prevents event bubbling,
        //        // which is probably what we want here, but won't
        //        // always be the case.
        //        return false;
        //      }
		//
		// 	 var downVoting = document.getElementById("downVoting");
		//
        //       //Set code to run when the link is clicked
        //       // by assigning a function to "onclick"
        //       upVoting.onclick = function() {
		//
        //         // Your code here...
 		// 	   doVoteNumber($myEventVotes, $eventID);
		//
        //         //If you don't want the link to actually
        //         // redirect the browser to another page,
        //         // "google.com" in our example here, then
        //         // return false at the end of this block.
        //         // Note that this also prevents event bubbling,
        //         // which is probably what we want here, but won't
        //         // always be the case.
        //         return false;
        //       }
		//
		//
		//
        //    }


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



function wrongPage(){
	echoHeader("Wrong Page!", "Wrong Page!");
	echo "<p class='textStyle' style='text-align:center'>Oops! 404 Error. You've reached the wrong page. Go back. or use a nav bar once I build it<p>";
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
