<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);

// $direction=$_REQUEST['direction'];
// $eventID=$_REQUEST['eventID'];
// $sessionUserID=$_SESSION['userID'];
$userVote = doesUserVoteExist($eventID, $_SESSION['userID'];);

if ($userVote !=null){
	deleteUserVote($userVote['0']['eventID'], $_SESSION['userID'];);
}


//DIDN'T ACTUALLY BUILD THIS






 ?>
