<?php
include('config/init.php');

//MAKE IT SO IT CAN ONLY DO THIS ONCE!
//right now it can do it as many times as it wants
upVoteinDB($_REQUEST['eventID']);



// what I had before
// upVoteinDB($_REQUEST['eventID']);
//
// $holder= $_REQUEST['eventVotes'];
// $holder++;
// echo $holder;

?>
