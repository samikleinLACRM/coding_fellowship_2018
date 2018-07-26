<?php

include('config/init.php');  

checkIfUserIsLoggedIn($_SESSION['userID']);

//if doesn't exists in DB, create it
$exists = getIfGoing($_SESSION['userID'], $_REQUEST['eventID']);

if($exists == null){ //which is should
	createGoing($_SESSION['userID'], $_REQUEST['eventID']);
	echoGoing($_REQUEST['eventID']);
}
