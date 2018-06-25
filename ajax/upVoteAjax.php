<?php

include('config/config.php');
include('config/init.php');

//MAKE IT SO IT CAN ONLY DO THIS ONCE!
//right now it can do it as many times as it wants
upVote($_REQUEST['eventID']);

$holder= $_REQUEST['eventVotes'];
$holder++;
echo $holder;

?>
