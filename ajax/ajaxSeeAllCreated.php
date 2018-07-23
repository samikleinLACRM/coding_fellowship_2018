<?php

include('config/init.php');

$toEcho = echoAllEventsCreated($_REQUEST['userID']);

echo $toEcho;
