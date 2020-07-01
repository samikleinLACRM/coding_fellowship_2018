<?php

include('config/init.php');

$toEcho = echoAllEventsGoingTo($_REQUEST['userID']);

echo $toEcho;
