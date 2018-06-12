<?php

include('config/config.php');
include('config/init.php');

echoHeader("Logged In", "Logged In");

echo "<div class='textStyle form'>";

//make a functino called verify user as lgoged in. so any page, u can call that function at top
if(!isset($_SESSION['Username'])){
	die("You're not logged in. <a href='logIn.php'>
	Go to the login page</a>");
}

echo "You're logged in as
	user: ".$_SESSION['Username']."
	<br><br>
	Click on this link to log out:
	<a href='loggedOut.php'>Log out</a>
	</div>";

?>
