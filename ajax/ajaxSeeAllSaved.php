<?php

include('config/init.php');

$toEcho = echoAllSavedEvents($_REQUEST['userID']);

echo $toEcho;
