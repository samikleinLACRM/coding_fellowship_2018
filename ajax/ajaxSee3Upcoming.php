<?php

include('config/init.php');

$toEcho = echo3EventsGoingTo($_REQUEST['userID']);

echo $toEcho;
