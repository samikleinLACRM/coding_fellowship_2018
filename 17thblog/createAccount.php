<?php

include('config/config.php');
include('config/init.php');

echoHeader("Create Account", "Create Account");

//form
$Errors = array();

if(isset($_REQUEST['createAccount'])){ //

	areWordsInField('Username');
	areWordsInField('Password');

	//if username already exists, print out the words "already exists, choose a new username", and then die.
	if(getUserByUsername($_REQUEST['Username'])) {
		$Errors['Problem:'] = 'This Username already exists. Please choose a new username.';
	}

	if(sizeof($Errors) == 0){
		insertUser(
			$_REQUEST['Username'],
			$_REQUEST['Password']
		);
		header("Location: accountCreated.php"); // this is how you redirect the browser directly.
		exit();
	}
}

//echo's form
echo "
<div class='textStyle form'>

	<div style='color:red'>";
	if(sizeof($Errors) > 0){
		foreach($Errors as $Index=>$Error){
			echo "*$Index $Error<br>";
		}
	}
echo "
	</div>
	<p style='font-size:18px'>Create Account:</p>
	<form action='' method='post'>

	Username: <input type='text' name='Username' value='".@$_REQUEST['Username']."' placeholder='username'/><br />
	Password: <input type='password' name='Password' value='".@$_REQUEST['Password']."' placeholder='password' id='myInput'/><br />
	<input type='checkbox' onclick='togglePasswordVisibility()'>Show Password
	<br>
	<input type='submit' name='createAccount' value='Sign Up' />
	</form>
</div>
";

echoFooter();
?>
