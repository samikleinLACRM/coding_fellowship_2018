<?php


function getAllEvents(){
	echo "hey";
	$result = dbQuery("
		SELECT *
		FROM events
		ORDER BY votes
	")->fetchAll();
	return $result;
}

function getOneEvent($eventID){
	$result = dbQuery("
		SELECT *
		FROM events
		WHERE eventID = :eventID
	", array(
		'eventID'=>$eventID
		))->fetch();
	return $result;
}


function getCatsForThisEvent($eventID){
	$result = dbQuery("
		SELECT *
		FROM categories
		INNER JOIN cat2events ON cat2events.catID = categories.catID
		WHERE cat2events.eventID = $eventID
	")->fetchAll();
	return $result;
}

function getUsersGoingToThisEvent($eventID){
	$result = dbQuery("
		SELECT *
		FROM users
		INNER JOIN usersGoing2events ON users.userID = usersGoing2events.userID
		WHERE usersGoing2events.eventID = $eventID
	")->fetchAll();
	return $result;
}
