<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

//if it exists in DB, delete it
$exists = doesFriendshipExist($_REQUEST['userID1'], $_REQUEST['userID2']);

if($exists != null){ //which is should
	deleteFriendship($_REQUEST['userID1'], $_REQUEST['userID2']);
	echoFriends($_REQUEST['userID2']);
}
