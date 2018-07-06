<?php

include('config/init.php');


// if it gets to here, saying an upvote should happen (from the UI standpoint at least)
//actually wait, p sure it should just like trigger it. like if it gets called on by the UI
//		js function, then check the db, if can do, do itt






//if a vote for this PK doesnt exist in DB, create itt
	//then if request direction up
		//increase vote in DB
	//else (aka down)
		//decrease vote in DB

$exists = doesUserVoteExist($_REQUEST['eventID'], $_REQUEST['userID']);

if($exists == null){
	insertUserVote($_REQUEST['eventID'], $_REQUEST['userID'], $_REQUEST['direction']);
	if($_REQUEST['direction'] == "up"){
		upVoteinDB($_REQUEST['eventID']);
	}
	else{
		downVoteinDB($_REQUEST['eventID']);
	}
}


//if vote exists,

//if downvote exists for this PK in DB, but not upVote
	//if the variable direction = up
		//delete the pk where direction is down
		//create a new w pk where direction is up
		//upvote in DB
	//else (aka variable direction is down)
		// then delete the vote where PK and
		//upvote in the DB

else if($exists['0']['direction'] == "down"){
	if($_REQUEST['direction'] == "up"){
		deleteUserVote($exists['0']['eventID'], $exists['0']['userID'], $exists['0']['direction']);
		insertUserVote($_REQUEST['eventID'], $_REQUEST['userID'], $_REQUEST['direction']);
		upVoteinDB($_REQUEST['eventID']);
	}
	else{
		deleteUserVote($exists['0']['eventID'], $exists['0']['userID'], $exists['0']['direction']);
		upVoteinDB($_REQUEST['eventID']);
	}
}



//else {aka upvote exists for this PK in DB, but not downvote}
	//if the variable direction is up
		//delete pk where direciton is up
		//downvote in DB
	//else (aka variable direciton is down)
		//delete pk where upvoted
		//create a pk where downVote
		//downvote the number in the DB


else { //aka exists[direction]==up
	if($_REQUEST['direction'] == "up"){
		deleteUserVote($exists['0']['eventID'], $exists['0']['userID'], $exists['0']['direction']);
		downVoteinDB($_REQUEST['eventID']);
	}
	else{
		deleteUserVote($exists['0']['eventID'], $exists['0']['userID'], $exists['0']['direction']);
		insertUserVote($_REQUEST['eventID'], $_REQUEST['userID'], $_REQUEST['direction']);
		downVoteinDB($_REQUEST['eventID']);
	}
}
