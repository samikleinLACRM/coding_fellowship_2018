<?php

include('config/init.php');

if(!isset($_SESSION['userID'])) {
	echoNotLoggedIn("You must be logged in to vote.");
	die();
}

$eventID=$_REQUEST['eventID'];

$userVote = doesUserVoteExist($eventID, $_SESSION['userID']);
if ($userVote !=null){
	deleteUserVote($userVote['0']['eventID'], $_SESSION['userID']);

	if($_REQUEST['ifBoth']!=null && $_REQUEST['direction'] == "up" || $_REQUEST['ifBoth']==null && $_REQUEST['direction'] == "down"){
		generalVoteinDB($eventID, "up");
	}
	else{
		generalVoteinDB($eventID, "down");
	}

}

//also assumed 3 cases: 1) insert&vote 2)delete&vote and 3)delete, insert, and vote
// if($userVote == null){
	insertUserVote($eventID, $_SESSION['userID'], $_REQUEST['direction']);
	generalVoteinDB($eventID, $_REQUEST['direction']);
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
