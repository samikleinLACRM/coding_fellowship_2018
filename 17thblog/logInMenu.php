<?php

include('config/config.php');
include('config/init.php');

//make these links into buttons later

echoHeader("Log In Or Create Account", "Log In Or Create Account");

echo "
<div class='textStyle form'>
	<a href='logIn.php'>Log In</a>
	<br><br>
	<a href='createAccount.php'>Create Account</a>
	<br><br>
	<a href='loggedOut.php'>Log Out</a>
</div>
";




?>
