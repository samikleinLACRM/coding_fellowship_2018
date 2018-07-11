<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

$eventID=$_REQUEST['eventID'];
$sessionUserID=$_SESSION['userID'];
$userVote = doesUserVoteExist($eventID, $sessionUserID);

if ($userVote !=null){ //should def be not null if get to this point tho
	deleteUserVote($userVote['0']['eventID'], $_SESSION['userID']);
}

$undoVotingDirection="up";
if($_REQUEST['direction'] == "up"){
	$undoVotingDirection="down";
}

generalVoteInDB($_REQUEST['eventID'], $undoVotingDirection);





// if($_REQUEST['ifUndoAndVote']!=null){
	// generalVoteInDB($_REQUEST['eventID'], $_REQUEST['direction']);
// }


// the following wasn't working :( but not sure why because I thought it was similiar logic to the front pages.

// if(($_REQUEST['ifUndoAndVote']!=null && $_REQUEST['direction'] == "up") || ($_REQUEST['ifUndoAndVote']==null && $_REQUEST['direction'] == "down")){
// 	generalVoteInDB($eventID, "up");
// }
// else{
// 	generalVoteInDB($eventID, "down");
// }

// generalVoteInDB($eventID, $_REQUEST['direction']);

// if($_REQUEST['ifUndoAndVote']!=null){ //if you have to undo the vote and then vote
// 	if($_REQUEST['direction'] == "up"){
// 		upVoteInDB($eventID);
// 	}
// 	else{ // aka direction is down
// 		downVoteInDB($eventID);
// 	}
// }
// else{	//if this is just undo-ing the vote, no next steps
// 	if($_REQUEST['direction'] == "up"){
// 		downVoteInDB($eventID);
// 	}
// 	else{ // aka direction is down
// 		upVoteInDB($eventID); //bc undoing the downvote
// 	}
// }
