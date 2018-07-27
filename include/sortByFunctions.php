<?php

function getAllEventsByDate(){
	$result = dbQuery("
		SELECT *
		FROM events
		ORDER BY dateOfEvent ASC
	")->fetchAll();
	return $result;
}

function getAllEventsByCategory($catID){
	$result = dbQuery("
		SELECT *
		FROM events
		INNER JOIN cat2events ON events.eventID = cat2events.eventID
		WHERE cat2events.catID = :catID
		ORDER BY dateOfEvent ASC
	", array(
		'catID'=>$catID
	))->fetchAll();
	return $result;
}


function getEventsWithThisDate($date){

}


function echoEventSortedBy($sortedBy, $catID){

	if($sortedBy == "date"){
		$allEvents = getAllEventsByDate();
	}
	if($sortedBy == "category"){
		$allEvents = getAllEventsByCategory($catID);
	}


	// echoNicely($allEventsByDate);
	echo "
	<br><br><br>
	<div class='row' style='margin-left:10%; margin-right:10%; '>";
		for($i=0; $i<count($allEvents); $i++){

			$eventID=$allEvents[$i]['eventID'];

			if ($i%3 === 0){
				//print column 1
				echoColumnEvent($eventID);
			}
			if ($i%3 === 1){
				//print column 2
				// echo "<div style='margin-left:5%; margin-right:5%;'>"; //for some reason it doesn't work
				echoColumnTwoEvent($eventID);
				// echo "</div>";
			}
			if ($i%3 === 2){
				//print column 3
				echoColumnEvent($eventID);
				echo "<br><br><br><br><br><br><br><br>
				<br><br><br><br><br><br>";
			}
		}
	echo "
	</div><br>";
}
