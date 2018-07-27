<?php

include('config/init.php');

$toEcho = echo3SavedEvents($_SESSION['userID']);

echo $toEcho;
