<?php

include('config/init.php');

//it should definitely exist, if getting here
$exists = doesUserVoteExist($_REQUEST['eventID'], $_REQUEST['userID']);

deleteUserVote($exists['0']['eventID'], $exists['0']['userID']);


if($_REQUEST['ifUndoAndVote']!=null){ //if you have to undo the vote and then vote
	if($_REQUEST['direction'] == "up"){
		upVoteInDB($_REQUEST['eventID']);
	}
	else{ // aka direction is down
		downVoteInDB($_REQUEST['eventID']);
	}
}
else{	//if this is just undo-ing the vote, no next steps
	if($_REQUEST['direction'] == "up"){
		downVoteInDB($_REQUEST['eventID']);
	}
	else{ // aka direction is down
		upVoteInDB($_REQUEST['eventID']); //bc undoing the downvote
	}
}
