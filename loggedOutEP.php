<?php
include('config/init.php');

echoHeader("Log Out", "Log Out");

if(!isset($_SESSION['userID'])){
	echo "
	<div class='textStyle form'>
		There is no one signed in, therefore there is no one to sign out!
	</div>
	";
}
else {
	unset($_SESSION['userID']);

	echo "
	<div class='textStyle form'>
		You have been sucessfully logged out!
	</div>
	";
}



?>
