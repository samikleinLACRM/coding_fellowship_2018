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

function echoUpVoteButton($eventID){
	echo"
	<a href='javascript://' onclick='upVotePlsWork($eventID);'>
		<img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px>
	</a>";

}

function echoDownVoteButton($eventID){ //sohuld there be a ; after the function?
	echo"
	<a href='javascript://' onclick='downVotePlsWork($eventID);'>
		<img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px>
	</a>";
}



function echoEvent($event){
	$eventID=$event['eventID'];
	echo"
		<div class='voteColumn'>
			<br>";
			echoUpVoteButton($eventID);

			echo "
			<br><br>
			<div id='eventWrapper_$eventID'>
				$event[votes]
			</div>
			<br>
			";
			echoDownVoteButton($eventID);
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

function insertChangedEvent($eventID, $votes, $name, $location, $date, $startTime, $endTime, $comeBc, $description, $pic){
	$result = dbQuery("
		INSERT INTO events(eventID, votes, name, location, dateOfEvent, startTime, endTime, comeBc, description, pic)
		VALUES(:eventID, :votes, :name, :location, :dateOfEvent, :startTime, :endTime, :comeBc, :description, :pic)
	", array(
		'eventID'=>$eventID,
		'votes'=>$votes,
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


function submitChangedEvent($eventID, $votes, $name, $location, $date, $startTime, $endTime, $comeBc, $description, $pic){
	deleteEvent($eventID);
	insertChangedEvent($eventID, $votes, $name, $location, $date, $startTime, $endTime, $comeBc, $description, $pic);
}
