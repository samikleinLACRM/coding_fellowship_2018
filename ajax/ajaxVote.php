<?php

include('config/init.php');

if(!isset($_SESSION['userID'])) {
	echoNotLoggedIn("You must be logged in to vote.");
	die();
}

$eventID=$_REQUEST['eventID'];
$sessionUserID=$_SESSION['userID'];
$direction=$_REQUEST['direction'];

$userVote = doesUserVoteExist($eventID, $sessionUserID);


//also assumed 3 cases: 1) insert&vote 2)delete&vote and 3)delete, insert, and vote
if($userVote == null){
	insertUserVote($eventID, $sessionUserID, $direction);
	generalVoteinDB($eventID, $direction);
}


else if(($userVote['0']['direction'] == "down" && $direction == "down")||($userVote['0']['direction'] == "up" && $direction == "down")){
	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
	generalVoteinDB($eventID, $direction);
}

else{
	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
	insertUserVote($eventID, $sessionUserID, $direction);
	generalVoteinDB($eventID, $direction);
}
