<?php

function validateFormField($formField){
	global $Errors;
	if(!$_REQUEST[$formField]){
		$Errors[$formField] = 'required';
	}
}

function createUser($username, $password){
	insertUser($username, $password);
	header("Location: accountCreated.php"); // this is how you redirect the browser directly.
	exit();
}


function insertUser($username, $password){
	$result = dbQuery("
		INSERT INTO users(username, password)
		VALUES(:username, :password)
	", array(
		'username'=>$username,
		'password'=>$password
	))->fetchAll(); //All
}

function getUserRow($username){
	$result = dbQuery("
		SELECT *
		FROM users
		WHERE username = :username
	", array(
		'username'=>$username
		))->fetch();
	return $result;
}

function verifyUser($username, $password){

//if this user exists w this pass in the database, then return true
//if not, return false

	$result=getUserRow($username);

	if ($password = $result['password']){
		return true;
	}
	else {
		return false;
	}
}

 ?>
