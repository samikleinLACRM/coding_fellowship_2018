<?php

session_start();

//make a functino called verify user as lgoged in. so any page, u can call that function at top
if(!isset($_SESSION['UserID'])){
	die("You're not logged in. <a href='testSession1.php'>
	Go to the login page</a>");
}

echo "You're logged in as
	user: ".$_SESSION['UserID']."
	<br><br>
	<a href='testSession3.php>Log out</a>'
	";

	//logging out, means removing userID from the session
?>
