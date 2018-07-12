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

//also assumed 3 cases: 1) insert&vote 2)delete&vote and 3)delete, insert, and vote
// if($userVote == null){
	insertUserVote($eventID, $sessionUserID, $direction);
	generalVoteinDB($eventID, $direction);
// }

// else {
// 	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
// 	if(($userVote['0']['direction'] == "up" && $direction == "up")||($userVote['0']['direction'] == "down" && $direction == "up")){
// 		insertUserVote($eventID, $sessionUserID, $direction);
// 	}
// 	generalVoteinDB($eventID, $direction);
// }


// else if(($userVote['0']['direction'] == "down" && $direction == "down")||($userVote['0']['direction'] == "up" && $direction == "down")){
// 	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
// 	generalVoteinDB($eventID, $direction);
// }
//
// else{
// 	deleteUserVote($userVote['0']['eventID'], $sessionUserID);
// 	insertUserVote($eventID, $sessionUserID, $direction);
// 	generalVoteinDB($eventID, $direction);
// }
