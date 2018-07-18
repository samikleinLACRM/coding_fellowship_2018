<?php

include('config/init.php');  //it's this it doesn't like

checkIfUserIsLoggedIn($_SESSION['userID']);

//if doesn't exists in DB, create it
$exists = doesFriendshipExist($_REQUEST['userID1'], $_REQUEST['userID2']);

// echo "exists = ".$exists;
var_dump($exists);
if($exists == null){ //which is should
	createFriendship($_REQUEST['userID1'], $_REQUEST['userID2']);  //this is the wrong part = wtf
	echo "hi73472";
	var_dump($_REQUEST);
	echoFriends($_REQUEST['userID2']);
}
