<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

//if it exists in DB, delete it
$exists = getIfSaved($_SESSION['userID'], $_REQUEST['eventID']);

if($exists != null){ //which is should
	deleteSave($_SESSION['userID'], $_REQUEST['eventID']);  
}
