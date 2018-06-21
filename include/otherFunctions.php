<?php


function echoHeader($Title, $PageName) {

	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Quicksand'>
			<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>

		</head>

		<body class='background'>

			";
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




// function wrongPage(){
// 	echoHeader("Wrong Page!", "Wrong Page!");
// 	echo "<p class='textStyle' style='text-align:center'>Oops! 404 Error. You've reached the wrong page. Use the Navigation Bar to go to another page. <p>";
// 	echoFooter();
// 	die("");
// }
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
// function echoNicely($interm) {
// 	echo "<pre>";
// 	var_dump($interm);
// 	echo "<pre>";
// }
//
//
// function echoJustDate($date){
// 	$timestamp = strtotime($date);
// 	$realDate = date('d-m-Y', $timestamp);
// 	return $realDate;
// }


?>
