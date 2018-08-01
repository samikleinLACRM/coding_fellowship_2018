<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

//these are not necessary, just a little cleaner?
$direction = $_REQUEST['direction'];
$eventID=$_REQUEST['eventID'];
$sessionUserID= $_SESSION['userID'];

//this deals with the undo&vote
$userVote = doesUserVoteExist($eventID, $sessionUserID);
if ($userVote !=null){
	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
	generalVoteinDB($eventID, $direction);
}

insertUserVote($eventID, $sessionUserID, $direction);
generalVoteinDB($eventID, $direction);
