<?php

include('config/init.php');


if(!isset($_SESSION['userID'])){ //if username is not set
	wrongPage("You are not logged in.");
	if($_REQUEST['userID']!= $_SESSION['userID']){ //if someone is not the logged in as this person, they can't edit their account
		wrongPage("You do not have permission to acsess this.");
	}
}

//make a form to change it

$user = getUserByUserID($_REQUEST['userID']);
echoHeader("Edit Your Account", null);
if(isset($_REQUEST['editAccount'])){ //

	editProfile(
		$_REQUEST['userID'],
		$_REQUEST['username'],
		$_REQUEST['displayName'],
		$_REQUEST['bio'],
		$_REQUEST['class']
		);
		header("Location: accountPage.php?userID=$_REQUEST[userID]");
		exit();
}
//prob need to change the date later
echo "
<div class='textStyle form' style='padding:30px; background-color:#a8edeb'>
	<form action='' method='post'>

	<div style='display:none'>
		User ID: <input type='number' name='userID' value='".$user['userID']."'>
	</div>

		Username: <input type='varchar' name='username' value='".$user['username']."'>
		<br><br>

		Display Name: <input type='text' name='displayName' value='".$user['displayName']."'>
		<br><br>

		Bio: <input type='text' name='bio' value='".$user['bio']."'>
		<br><br>

		Class: <input type='varchar' name='class' value='".$user['class']."'>
		<br><br>

		<input type='submit' name='editAccount' value='Submit your changes' />
	</form>
</div>
";
