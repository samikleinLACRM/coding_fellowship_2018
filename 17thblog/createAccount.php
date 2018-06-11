<?php

include('config/config.php');
include('config/init.php');

echoHeader("Create Account", "Create Account");

//form
$Errors = array();

if(isset($_REQUEST['createAccount'])){ //

	validateFormField('Username');
	validateFormField('Password');

	if(sizeof($Errors) == 0){
		createUser(
			$_REQUEST['Username'],
			$_REQUEST['Password']
		);
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
	<p style='font-size:18px'>Create Account:</p>
	<form action='' method='post'>

	Username: <input type='text' name='Username' value='".@$_REQUEST['Username']."'/><br />
	Password: <input type='text' name='Password' value='".@$_REQUEST['Password']."'/><br />

	<br>
	<input type='submit' name='createAccount' value='Sign Up' />
	</form>
</div>
";

echoFooter();
?>
