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


function insertUser($username, $password, $email, $displayName){
	$result = dbQuery("
		INSERT INTO users(username, password, email, displayName)
		VALUES(:username, :password, :email, :displayName)
	", array(
		'username'=>$username,
		'password'=>$password,
		'email'=>$email,
		'displayName'=>$displayName
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


function getUsersGoing($eventID){

}


function getCreator($eventID){

}


function getAllEventsThisUserIsGoingTo($userID){
	$result = dbQuery("
		SELECT *
		FROM events
		INNER JOIN usersGoing2events ON events.eventID = usersGoing2events.eventID
		WHERE usersGoing2events.userID = :userID
		ORDER BY dateOfEvent ASC
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;

}

function getAllEventsThisUserCreated($userID){
	$result = dbQuery("
		SELECT *
		FROM events
		INNER JOIN usersCreated2events ON events.eventID = usersCreated2events.eventID
		WHERE usersCreated2events.userID = :userID
		ORDER BY dateOfEvent ASC
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;

}

function getAllThisUsersFriends($userID){
	$result = dbQuery("
	SELECT *
	FROM users
	INNER JOIN friends ON users.userID = friends.userID2
	WHERE friends.userID1 = :userID
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;
}

 ?>
