<?php
include('config/init.php');

//MAKE IT SO IT CAN ONLY DO THIS ONCE!
//right now it can do it as many times as it wants
downVoteInDB($_REQUEST['eventID']);

// $event=getOneEvent($_REQUEST['eventID']);
// 
// $holder= $event['votes'];
// $holder--;
// echo $holder;

//whatever u echo becomes data
?>
