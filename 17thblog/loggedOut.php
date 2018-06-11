<?php

include('config/config.php');
include('config/init.php');

unset($_SESSION['Username']);
unset($_SESSION['Password']);

echoHeader("Log Out", "Log Out");

echo "
<div class='textStyle form'>
	You have been sucessfully logged out!
</div>
";

?>
