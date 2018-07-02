<?php
include('config/init.php');

// process form
$Errors = array();
if(isset($_REQUEST['createAccount'])){ //
	areWordsInField('Email');
	areWordsInField('Username');
	areWordsInField('Password');
	//if username already exists, print out the words "already exists, choose a new username", and then die.
	if(getUserByUsername($_REQUEST['Username'])) {
		$Errors['Problem: Username.'] = '<br>This Username already exists. Please choose a new username.';
	}
	if(getUserByUserEmail($_REQUEST['Email'])) {
		$Errors['Problem: Email.'] = '<br>This Email is already in use for an account. Please use a different email.';
	}
	if(sizeof($Errors) == 0){
		insertUser(
			$_REQUEST['Username'],
			$_REQUEST['Password'],
			$_REQUEST['Email'],
			$_REQUEST['DisplayName']
		);
		header("Location: accountCreatedEP.php"); // this is how you redirect the browser directly.
		exit();
	}
}

echoHeader("Create Account", "Create Account");

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
	Email: <input type='email' name='Email' value='".@$_REQUEST['Email']."' placeholder='email'><br><br>
	Username: <input type='text' name='Username' value='".@$_REQUEST['Username']."' placeholder='username'><br><br>
	Display Name: <input type='text' name='DisplayName' value='".@$_REQUEST['DisplayName']."' placeholder='display name'><br><br>
	Password: <input type='password' name='Password' value='".@$_REQUEST['Password']."' placeholder='password' id='myInput'><br>
	<input type='checkbox' onclick='togglePasswordVisibility()'>Show Password<br>
	<br>
	<input type='submit' name='createAccount' value='Sign Up' />
	</form>
</div>
";

// echoFooter();
?>
