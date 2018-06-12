<?php

include('config/config.php');
include('config/init.php');

echoHeader("Log In", "Log In");

if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])) {
	echo "
	<div class='textStyle form'>
		**You are already logged in as $_SESSION[Username]!**
		<br>
		Click here to Log Out:
		<a href='loggedOut.php'>Log Out</a>
	</div>";
}

//form
$Errors = array();

if(isset($_REQUEST['logIn'])){ //

	validateFormField('Username');
	validateFormField('Password');

	if(sizeof($Errors) == 0){

		if(verifyUser($_REQUEST['Username'], $_REQUEST['Password']) == true) {

			//set the session username = to that req and set the pass = to that
			$_SESSION['Username'] = $_REQUEST['Username'];
			$_SESSION['Password'] = $_REQUEST['Password'];

			header("Location: loggedIn.php"); // this is how you redirect the browser directly.
			exit();

		}
		else {
			echo "
			<br>
			<div class='textStyle' style='color:red'>
				*Username & Password not found.
			</div>
			";

		}
	}
}

//echo's form
echo "
<div class='textStyle form'>

	<div style='color:red'>";
	if(sizeof($Errors) > 0){
		foreach($Errors as $Index=>$Error){
			echo "*$Index is $Error<br>";
		}
	}
echo "
	</div>
	<p style='font-size:18px'>Log In:</p>
	<form action='' method='post'>

	Username: <input type='text' name='Username' value='".@$_REQUEST['Username']."' placeholder='username'/><br />
	Password: <input type='password' name='Password' value='".@$_REQUEST['Password']."' placeholder='password' id='myInput'/><br />
	<input type='checkbox' onclick='togglePasswordVisibility()'>Show Password
	<br>
	<input type='submit' name='logIn' value='Sign In' />
	</form>
</div>
";


echoFooter();
?>
