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


function getWhoCreatedEvent($eventID){
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
	<a href='#' onclick='hey($eventID);'>
		<img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px>
	</a>";

}

function echoDownVoteButton($eventID){ //sohuld there be a ; after the function?
	echo"
	<a href='#' onclick='hi($eventID);'>
		<img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px>
	</a>";
}

?>
<script type='text/javascript'>
function hey(eventID){

	var varEventIDblah = eventID;
	console.log("hey");
	console.log(eventID);

	$.post('/ajax/upVoteAjax.php', {eventID:varEventIDblah}, function(data) {
		console.log(data);
		document.getElementById("up").innerHTML = data;
	// }).fail(function(data) {
	// 	console.log('Error: ' + data);
	});
}
</script>

<script type='text/javascript'>
function hi(eventID){

	var varEventIDblah = eventID;
	console.log("hi");
	console.log(eventID);

	$.post('/ajax/downVoteAjax.php', {eventID:varEventIDblah}, function(data) {
		console.log(data);
		document.getElementById("down").innerHTML = data;
	// }).fail(function(data) {
	// 	console.log('Error: ' + data);
	});
}
</script>

<?php



function echoEvent($event){
	$eventID=$event['eventID'];

	echo"
		<div class='voteColumn'>
			<br>";
			echoUpVoteButton($eventID);
			echo "<div id='votes'>
				<br>
				$event[votes]
				<br><br>
			</div>
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



function insertEvent($name, $location, $date, $startTime, $endTime, $comeBc, $description){
	$result = dbQuery("
		INSERT INTO events(name, votes, location, dateOfEvent, startTime, endTime, comeBc, description)
		VALUES(:name, '0', :location, :dateOfEvent, :startTime, :endTime, :comeBc, :description)
	", array(
		'name'=>$name,
		'location'=>$location,
		'dateOfEvent'=>$date,
		'startTime'=>$startTime,
		'endTime'=>$endTime,
		'comeBc'=>$comeBc,
		'description'=>$description
	))->fetchAll(); //All
}
