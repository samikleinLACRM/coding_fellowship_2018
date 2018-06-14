<?php

include('config/config.php');
include('config/init.php');

unset($_SESSION['userID']);

echoHeader("Log Out", "Log Out");

echo "
<div class='textStyle form'>
	You have been sucessfully logged out!
</div>
";

?>
