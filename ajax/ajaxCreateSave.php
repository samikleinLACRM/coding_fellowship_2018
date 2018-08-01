<?php

include('config/init.php'); 

checkIfUserIsLoggedIn($_SESSION['userID']);

//if doesn't exists in DB, create it
$exists = getIfSaved($_SESSION['userID'], $_REQUEST['eventID']);

if($exists == null){ //which is should
	createSave($_SESSION['userID'], $_REQUEST['eventID']);
}
