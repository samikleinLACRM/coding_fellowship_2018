<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);


$userVote = doesUserVoteExist($_REQUEST['eventID'], $_SESSION['userID']);

if ($userVote !=null){ //just in case, bc should def be not null if get to this point
	deleteUserVote($userVote['0']['eventID'], $_SESSION['userID']);
}

$undoVotingDirection="up";
if($_REQUEST['direction'] == "up"){
	$undoVotingDirection="down";
}

generalVoteInDB($_REQUEST['eventID'], $undoVotingDirection);
