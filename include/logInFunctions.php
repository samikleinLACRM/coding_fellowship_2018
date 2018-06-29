<?php


//NOTES:
// THIS IS FROM MY BLOG, BUT PROB GONNA USE SOMETHING SIMILAIR LATER.
// HAVENT GONE OVER IT

function verifyUserIsLoggedIn($session){
	if(!isset($session['userID'])){
		die("You're not logged in. <a href='logInEP.php'>
		Go to the login page</a>");
	}
	else {
		$row = getUserByUserID($session['userID']);
		echo "You're logged in as
		user: ".$row['username']."
		<br><br>
		Click on this link to log out:
		<a href='loggedOutEP.php'>Log out</a>
		</div>";
	}
}

function areWordsInField($formField){
	global $Errors;
	if(!$_REQUEST[$formField]){
		$Errors[$formField] = 'is required';
	}
}


function insertUser($username, $password, $email){
	$result = dbQuery("
		INSERT INTO users(username, password, email)
		VALUES(:username, :password, :email)
	", array(
		'username'=>$username,
		'password'=>$password,
		'email'=>$email
	))->fetchAll(); //All
}

function getUserByUsername($username){
	$result = dbQuery("
		SELECT *
		FROM users
		WHERE username = :username
	", array(
		'username'=>$username
	))->fetch(); //should this be All?? if having problems, check
	return $result;
}

function getUserByUserID($userID){
	$result = dbQuery("
		SELECT *
		FROM users
		WHERE userID = :userID
	", array(
		'userID'=>$userID
	))->fetch(); //should this be All?? if having problems, check
	return $result;
}


function getUserByUserEmail($userEmail){
	$result = dbQuery("
		SELECT *
		FROM users
		WHERE email = :email
	", array(
		'email'=>$userEmail
	))->fetch(); //should this be All?? if having problems, check
	return $result;
}



function verifyUser($username, $password){

//if this user exists w this pass in the database, then return true
//if not, return false

	$result=getUserByUsername($username);

	if ($password == $result['password']){
		return true;
	}
	else {
		return false;
	}
}

 ?>
