<?php

include('config/init.php');

if(!isset($_SESSION['userID'])) {  //&& !empty($_SESSION['userID']) <-- had this before. not sure if necessary
	echoNotLoggedIn("You must be logged in to vote.");
	die();
}

$eventID=$_REQUEST['eventID'];
$sessionUserID=$_SESSION['userID'];
$userVote = doesUserVoteExist($eventID, $sessionUserID);

deleteUserVote($userVote['0']['eventID'], $_SESSION['userID']);


// if(($_REQUEST['ifUndoAndVote']!=null && $_REQUEST['direction'] == "up") || ($_REQUEST['ifUndoAndVote']==null && $_REQUEST['direction'] == "down")){
// 	generalVoteInDB($eventID, "up");
// }
// else{
// 	generalVoteInDB($eventID, "down");
// }


if($_REQUEST['ifUndoAndVote']!=null){ //if you have to undo the vote and then vote
	if($_REQUEST['direction'] == "up"){
		upVoteInDB($eventID);
	}
	else{ // aka direction is down
		downVoteInDB($eventID);
	}
}
else{	//if this is just undo-ing the vote, no next steps
	if($_REQUEST['direction'] == "up"){
		downVoteInDB($eventID);
	}
	else{ // aka direction is down
		upVoteInDB($eventID); //bc undoing the downvote
	}
}
