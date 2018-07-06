<?php

include('config/init.php');

downVoteinDB($_REQUEST['eventID']);

//save relationship in DB
insertUserVote($_REQUEST['eventID'], $_REQUEST['userID'], "down");
