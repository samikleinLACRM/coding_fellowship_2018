<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);


//wowow, wait, don't trust the client. should be getting this stuff from server

// if exists in DB, delete it

deleteFriendship($_REQUEST['userID1'], $_REQUEST['userID2']);

 ?>
