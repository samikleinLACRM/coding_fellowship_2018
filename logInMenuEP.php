<?php
include('config/init.php');
//make these links into buttons later
echoHeader("Log In Menu", "Log In Menu");

if(isset($_SESSION['userID'])) {  //&& !empty($_SESSION['userID']) <-- had this before. not sure if necessary
	$row=getUserByUserID($_SESSION['userID']);
	$username=$row['username'];
	echo "
	<div class='textStyle form'>
		*You are already logged in as $username*
		<br>
		Click here to log out:
		<a href='loggedOutEP.php'> <u>Log Out</u></a>
	</div>";
	die();
}

echo "
<div class='textStyle form'>
	<a href='logInEP.php'>Log In</a>
	<br><br>
	<a href='createAccountEP.php'>Create Account</a>
	<br><br>
	<a href='loggedOutEP.php'>Log Out</a>
</div>
";

// $user = getUserByUserID(3);
// var_dump($user);

?>
