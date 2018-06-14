<?php


function echoHeader($Title, $PageName) {

?>
	<script src="/include/jquery.js"></script>
	<script type='text/javascript'>

	function togglePasswordVisibility(){
		var x = document.getElementById("myInput");
	    if (x.type === "password") {
	        x.type = "text";
	    } else {
	        x.type = "password";
	    }
	}

	</script>
<?php

	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>

		</head>

		<body class='bg'>
			<div class='navbarStyle'>
				<a href='main.php'>Home |</a>
				<a href='blogIndex.php'>Blog |</a>
				<a href='projects.php'>Projects |</a>
				<a href='logInMenu.php'>Log In</a>
			</div>";
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
	echo "<p class='textStyle' style='text-align:center'>Oops! 404 Error. You've reached the wrong page. Use the Navigation Bar to go to another page. <p>";
	echoFooter();
	die("");
}

function echoFooter(){
	echo "
		<div class='row right footer'>
			Sami Klein <br>
			email: sami.klein@wustl.edu <br>
		</div>
</body>
	";
}


function echoNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}


function echoJustDate($date){
	$timestamp = strtotime($date);
	$realDate = date('d-m-Y', $timestamp);
	return $realDate;
}


?>
