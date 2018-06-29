<?php

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
