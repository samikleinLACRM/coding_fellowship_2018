<?php

function getAllEvents(){
	$result = dbQuery("
		SELECT *
		FROM events
		ORDER BY votes DESC
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


function getCatByName($name){
	$result = dbQuery("
		SELECT *
		FROM categories
		WHERE name = :name
	", array(
		'name'=>$name
		))->fetch();
	return $result;
}

function getAnEventByNameAndDate($name, $date){
	$result = dbQuery("
		SELECT *
		FROM events
		WHERE name = :name AND dateOfEvent= :date
	", array(
		'name'=>$name,
		'date'=>$date
		))->fetch();
	return $result;
}


function getCatsForThisEvent($eventID){
	$result = dbQuery("
		SELECT *
		FROM categories
		INNER JOIN cat2events ON cat2events.catID = categories.catID
		WHERE cat2events.eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;
}

function getUsersGoingToThisEvent($eventID){
	$result = dbQuery("
		SELECT *
		FROM users
		INNER JOIN usersGoing2events ON users.userID = usersGoing2events.userID
		WHERE usersGoing2events.eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;
}


function getEventCreator($eventID){
	$result = dbQuery("
		SELECT *
		FROM usersCreated2events
		INNER JOIN users ON users.userID = usersCreated2events.userID
		WHERE usersCreated2events.eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetch();
	return $result;

}


function getAllEventsButTopThree(){
	$result = dbQuery("
		SELECT *
		FROM events
		ORDER BY votes
		DESC limit 3,100000
	")->fetchAll();
	return $result;

}


function getTopThreeEvents(){
	$result = dbQuery("
		SELECT *
		FROM events
		ORDER BY votes DESC
		LIMIT 3
	")->fetchAll();
	return $result;

}


function echoColumnEvent($eventID){
	$thisEvent=getOneEvent($eventID);
	echo "
	<div class='trendingColumn'>";
		echoEvent($thisEvent);
	echo "
	</div>";
}

function echoColumnTwoEvent($eventID){
	$thisEvent=getOneEvent($eventID);
	echo "<div class='trendingColumn' style='margin-left:5%; margin-right:5%;'>";
		echoEvent($thisEvent);
	echo "
	</div>";
}

// $direction = "up";
function echoUpVoteButton($eventID, $upVoted){
	$direction = 'up'; //nic fixed this. very weird string stuff, but it works now!
	if(!isset($_SESSION['userID'])){
		$s = null;
	}
	else{
		$s = $_SESSION['userID'];
	}
	echo"
	<a href='javascript://' onclick=\"intakeVote($eventID, '$direction', $s);\">
		<img id='upVoteButton_$eventID' class='iconAligned $upVoted' src='/pics/arrow2.jpg' alt='arrow' height=40px>
	</a>";

}

function echoDownVoteButton($eventID, $downVoted){ //sohuld there be a ; after the function?
	$direction = 'down';
	if(!isset($_SESSION['userID'])){
		$s = null;
	}
	else{
		$s = $_SESSION['userID'];
	}
	echo"
	<a href='javascript://' onclick=\"intakeVote($eventID, '$direction', $s);\">
		<img id='downVoteButton_$eventID' class='iconAligned $downVoted' src='/pics/line2.jpg' alt='line' height=40px>
	</a>";
}



function echoEvent($event){
	$eventID=$event['eventID'];
	$upVoted = null;
	$downVoted= null;
	if(isset($_SESSION['userID'])){
		$vote = doesUserVoteExist($eventID, $_SESSION['userID']);
		if ($vote !=null){
			if ($vote['0']['direction'] == "up"){
				$upVoted="voted";
			}
			else{ //which means that direction must be down
				$downVoted="voted";
			}
		}
	}


	echo"
		<div class='voteColumn'>
			<br>";
			echoUpVoteButton($eventID, $upVoted);

			echo "
			<br><br>
			<div id='eventWrapper_$eventID'>
				$event[votes]
			</div>
			<br>
			";
			echoDownVoteButton($eventID, $downVoted);
			echo "
		</div>

		<div class='bodyColumn'>
			<a href='singleEventPage.php?eventID=$eventID'>
				<h2 style='border:solid; margin:5px;'>$event[name]</h2>
				<p>$event[dateOfEvent]</p>
				<p>$event[location]</p>
				<p><strong>Come Bc:</strong> $event[comeBc]</p>
			</a>
		</div>
	";
}

function generalVoteinDB($eventID, $direction){
	$sign = "+";
	if ($direction == "down"){
		$sign = "-";
	}

	$result = dbQuery("
		UPDATE events
		SET votes = votes $sign 1
		WHERE eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;
}


function upVoteinDB($eventID){
	$result = dbQuery("
		UPDATE events
		SET votes = votes + 1
		WHERE eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;
}


function downVoteInDB($eventID){

//do I want this to be an actual subtraction of votes,
// or just a not upvote thing (like u press it if u upvoted and want to take it back)

	$result = dbQuery("
		UPDATE events
		SET votes = votes - 1
		WHERE eventID = :eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;

}



function insertEvent($name, $location, $date, $startTime, $endTime, $comeBc, $description, $pic){
	$result = dbQuery("
		INSERT INTO events(name, votes, location, dateOfEvent, startTime, endTime, comeBc, description, pic)
		VALUES(:name, '0', :location, :dateOfEvent, :startTime, :endTime, :comeBc, :description, :pic)
	", array(
		'name'=>$name,
		'location'=>$location,
		'dateOfEvent'=>$date,
		'startTime'=>$startTime,
		'endTime'=>$endTime,
		'comeBc'=>$comeBc,
		'description'=>$description,
		'pic'=>$pic
	))->fetchAll(); //All
}

function editEvent($eventID, $name, $location, $date, $startTime, $endTime, $comeBc, $description, $pic){
	$result = dbQuery("
	UPDATE events
	SET name = :name,
	location = :location,
	dateOfEvent = :dateOfEvent,
	startTime = :startTime,
	endTime = :endTime,
	comeBc = :comeBc,
	description = :description,
	pic = :pic
	WHERE eventID = :eventID
	", array(
		'eventID'=>$eventID,
		'name'=>$name,
		'location'=>$location,
		'dateOfEvent'=>$date,
		'startTime'=>$startTime,
		'endTime'=>$endTime,
		'comeBc'=>$comeBc,
		'description'=>$description,
		'pic'=>$pic
	))->fetchAll(); //All
}

function getAllCategories(){
	$result = dbQuery("
		SELECT *
		FROM categories
	")->fetchAll();
	return $result;

}



function insertCatCombo($eventID, $catID){
	$result = dbQuery("
		INSERT INTO cat2events(eventID, catID)
		VALUES(:eventID, :catID)
	", array(
		'eventID'=>$eventID,
		'catID'=>$catID
	))->fetchAll(); //All
}




function insertCategory($name, $color){
	$result = dbQuery("
		INSERT INTO categories(name, color)
		VALUES(:name, :color)
	", array(
		'name'=>$name,
		'color'=>$color
	))->fetchAll(); //All
}

//deletes event by eventID
function deleteEvent($newEventID) {
	$result = dbQuery("
		DELETE FROM events
		WHERE eventID = :eventID
		", array(
			'eventID'=>$newEventID
	))->fetch();
}


function doesUserVoteExist($eventID, $userID){
	$result = dbQuery("
		SELECT *
		FROM events2usersVoted
		WHERE eventID = :eventID
		AND userID = :userID
	", array(
		'eventID'=>$eventID,
		'userID'=>$userID
	))->fetchAll();
	return $result;
}


function insertUserVote($eventID, $userID, $direction){
	$result = dbQuery("
		INSERT INTO events2usersVoted(eventID, userID, direction)
		VALUES(:eventID, :userID, :direction)
	", array(
		'eventID'=>$eventID,
		'userID'=>$userID,
		'direction'=>$direction
	))->fetchAll(); //All
}

function deleteUserVote($eventID, $userID){
	$result = dbQuery("
		DELETE FROM events2usersVoted
		WHERE eventID = :eventID
		AND userID = :userID
		", array(
			'eventID'=>$eventID,
			'userID'=>$userID,
	))->fetchAll();
}
