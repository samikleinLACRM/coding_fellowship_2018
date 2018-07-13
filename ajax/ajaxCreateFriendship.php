<?php

include('config/init.php');

checkIfUserIsLoggedIn($_SESSION['userID']);


//wowow, wait, don't trust the client. should be getting this stuff from server

//if doesn't exists in DB, create it




createFriendship($_REQUEST['userID1'], $_REQUEST['userID2']);

 ?>
