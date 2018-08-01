<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

//if it exists in DB, delete it
$exists = getIfGoing($_SESSION['userID'], $_REQUEST['eventID']);

if($exists != null){ //which is should
	deleteGoing($_SESSION['userID'], $_REQUEST['eventID']);
	echoGoing($_REQUEST['eventID']);
}
