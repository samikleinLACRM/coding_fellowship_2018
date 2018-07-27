<?php

function getIfGoing($userID, $eventID){
	$result = dbQuery("
		SELECT *
		FROM usersGoing2events
		WHERE eventID = :eventID
		AND userID = :userID
	", array(
		'eventID'=>$eventID,
		'userID'=>$userID
	))->fetchAll();
	return $result;

}

function createGoing($userID, $eventID){
	$result = dbQuery("
		INSERT INTO usersGoing2events(userID, eventID)
		VALUES(:userID, :eventID)
	", array(
		'userID'=>$userID,
		'eventID'=>$eventID
	))->fetchAll(); //All
}

function deleteGoing($userID, $eventID){
	$result = dbQuery("
		DELETE FROM usersGoing2events
		WHERE (userID = :userID AND eventID = :eventID)
	", array(
		'userID'=>$userID,
		'eventID'=>$eventID
	))->fetchAll();
}

function echoGoing($eventID){
	$usersGoing=getUsersGoingToThisEvent($eventID);

	$numPeopleGoing = count($usersGoing);
	if ($numPeopleGoing == 1){
		$ppl = "person";
	}
	else{
		$ppl = "people";
	}

	echo "
	<div class='column'>
		<p class='heading'>Going ($numPeopleGoing $ppl): </p>";

		foreach ($usersGoing as $oneUserGoing) {
			echo "
			<div class='friendBox'>
				<div style='float:left; overflow:auto;'>
					<img src='/pics/smiley.jpg' alt='Smiley face' width='50' height='50'>
				</div>
				<div class='friendName'>
					<a href='accountPage.php?userID=$oneUserGoing[userID]'>$oneUserGoing[username]</a>
				</div>
			</div>";
		}

		echo"
	</div>";
}



function getIfSaved($userID, $eventID){
	$result = dbQuery("
		SELECT *
		FROM users2SavedEvents
		WHERE eventID = :eventID
		AND userID = :userID
	", array(
		'eventID'=>$eventID,
		'userID'=>$userID
	))->fetchAll();
	return $result;

}

function createSave($userID, $eventID){
	$result = dbQuery("
		INSERT INTO users2SavedEvents(userID, eventID)
		VALUES(:userID, :eventID)
	", array(
		'userID'=>$userID,
		'eventID'=>$eventID
	))->fetchAll(); //All
}

function deleteSave($userID, $eventID){
	$result = dbQuery("
		DELETE FROM users2SavedEvents
		WHERE (userID = :userID AND eventID = :eventID)
	", array(
		'userID'=>$userID,
		'eventID'=>$eventID
	))->fetchAll();
}




function echoAllSavedEvents($userID){

	$eventsSaved=getAllSavedEvents($userID);

	echo "<br>";
	// echoNicely($eventsSaved);

	if ($eventsSaved == null) {
		echo "0 events saved";
	}
	else {
		foreach ($eventsSaved as $event) {
		echo "
		<div class='row accountColumn' style='border:solid; border-color: gray;'>";
			echoEvent($event);
		echo "
		</div><br>";
		}
	}
}


function getAllSavedEvents($userID){
	$result = dbQuery("
		SELECT *
		FROM events
		INNER JOIN users2SavedEvents ON events.eventID = users2SavedEvents.eventID
		WHERE users2SavedEvents.userID = :userID
		ORDER BY dateOfEvent ASC
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;
}


function get3SavedEvents($userID){
	$result = dbQuery("
		SELECT *
		FROM events
		INNER JOIN users2SavedEvents ON events.eventID = users2SavedEvents.eventID
		WHERE users2SavedEvents.userID = :userID
		ORDER BY dateOfEvent ASC
		LIMIT 3
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;
}

function echo3SavedEvents($userID){

	$threeEvents=get3SavedEvents($userID);

	echo "<br>";

	if ($threeEvents == null) {
		echo "0 events saved";
	}
	else {
		foreach ($threeEvents as $event) {
		echo "
		<div class='row accountColumn' style='border:solid; border-color: gray;'>";
			echoEvent($event);
		echo "
		</div><br>";
		}
	}
}
