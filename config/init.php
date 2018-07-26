<?php
include('config/config.php');

date_default_timezone_set('America/Chicago');

include('include/db_query.php'); //this should happen right after config so other functions have access to the database
include('include/eventFunctions.php');
include('include/echoFunctions.php');
include('include/logInFunctions.php');
include('include/friendFunctions.php');
include('include/algorithmFunctions.php');
include('include/goingFunctions.php');


// include('include/jsFunctions.php');


session_start();
