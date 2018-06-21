<?php
include('config/config.php');
include('config/init.php');

echoHeader("Log In", "Log In");

if(isset($_SESSION['userID'])) {  //&& !empty($_SESSION['userID']) <-- had this before. not sure if necessary
	$row=getUserByUserID($_SESSION['userID']);
	$username=$row['username'];
	echo "
	<div class='textStyle form'>
		*You are already logged in as $username*
		<br>
		Click here to Log Out:
		<a href='loggedOutEP.php'>Log Out</a>
	</div>";
}

//form
$Errors = array();
if(isset($_REQUEST['logIn'])){ //
	//if tries to log in while already logged in
	if(isset($_SESSION['userID'])){
		$Errors['Cannot log in:'] = 'because you are already logged in. Please log out before you log in again.';
	}
	if(!isset($_SESSION['userID'])){
		areWordsInField('Username');
		areWordsInField('Password');
	}
	if(sizeof($Errors) == 0){
		if(verifyUser($_REQUEST['Username'], $_REQUEST['Password'])) {
			$row=getUserByUsername($_REQUEST['Username']);
			$userID=$row['userID'];
			$_SESSION['userID'] = $userID;
			header("Location: loggedInEP.php");
			exit();
		}
		else {
			echo "
			<br>
			<div class='textStyle form' style='color:red'>
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
			echo "*$Index $Error<br>";
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

// echoFooter();
?>
