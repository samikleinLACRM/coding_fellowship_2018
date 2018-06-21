
<?php
include('config/config.php');
include('config/init.php');
//make these links into buttons later
echoHeader("Log In Menu", "Log In Menu");
echo "
<div class='textStyle form'>
	<a href='logInEP.php'>Log In</a>
	<br><br>
	<a href='createAccountEP.php'>Create Account</a>
	<br><br>
	<a href='loggedOutEP.php'>Log Out</a>
</div>
";

// $user = getUserByUserID(3);
// var_dump($user);

?>
