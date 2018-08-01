<?php

include('config/init.php');  //it's this it doesn't like

checkIfUserIsLoggedIn($_SESSION['userID']);

//if doesn't exists in DB, create it
$exists = doesFriendshipExist($_REQUEST['userID1'], $_REQUEST['userID2']);

if($exists == null){ //which is should
	createFriendship($_REQUEST['userID1'], $_REQUEST['userID2']);  //this is the wrong part = wtf
	echoFriends($_REQUEST['userID2']);
}
