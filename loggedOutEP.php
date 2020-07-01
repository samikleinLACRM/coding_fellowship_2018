<?php
include('config/init.php');

echoHeader("Log Out", "Log Out");

if(!isset($_SESSION['userID'])){
	echo "
	<div class='textStyle form'>
		You are not signed in, therefore there is no one to sign out!
	</div>
	";
}
else {
	unset($_SESSION['userID']);

	echo "
	<div class='textStyle form'>
		You have been sucessfully logged out!
		<br>	<br>
			<a href='logInEP.php'>Log In</a>
	</div>
	";
}



?>
