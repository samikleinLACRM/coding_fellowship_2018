<?php
include('config/config.php');
include('config/init.php');

echoHeader("Logged In", "Logged In");

echo "<div class='textStyle form'>";

verifyUserIsLoggedIn($_SESSION['userID']);
//need to make it so saves userID in the session

?>
