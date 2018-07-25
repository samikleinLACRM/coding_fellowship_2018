<?php


function calculatePoints($event){

	$points = 0;

	// these both get in the format of 'July 24, 2018'
	$shortEventDate=formatDateToCalculate($event['dateOfEvent']);
	$shortTodayDate= date("F j, Y");

	$fullEventDate = $event['dateOfEvent']; //00:00 version
	$fullTodayDate = date('Y-m-d H:i:s'); //00:00 version

	$dateDiff= dateDifference($fullTodayDate, $event['dateOfEvent'])+1;


	//NOTE: there is probably a better way to do this than a bunch of if statements,
	// 		but just doing this for now.
	if($shortEventDate==$shortTodayDate){
		// echo "same day";
		$points = $points +500;
	}
	else if($dateDiff == 1){ //aka tomorrow
		$points = $points +450;
	}
	else if($dateDiff == 2){ //aka 2 days away
		$points = $points +350;
	}
	else if($dateDiff == 3){
		$points = $points +250;
	}
	else if($dateDiff == 4){
		$points = $points +200;
	}
	else if($dateDiff == 5){
		$points = $points +100;
	}
	else if(15>$dateDiff&&$dateDiff > 5){
		$points = $points +100;
	}
	else if(60 > $dateDiff && $dateDiff >30){
		$points = $points -300;
	}
	else if($dateDiff >60){
		$points = $points -400;
	}
	else if($dateDiff <0){
		$points = $points -500;
	}


	$points=$points+($event['votes']*1.5);
	$yMDH=date('Y-m-d-H');
	updatePoints($event['eventID'], $points, $yMDH);
}


//found this online
function dateDifference($date_1 , $date_2 , $differenceFormat = '%R%a' ){
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format($differenceFormat);
}


function updatePoints($eventID, $points, $yMDH){
	$result = dbQuery("
	UPDATE events
	SET points = :points,
	lastCalculated2 = :yMDH
	WHERE eventID = :eventID
	", array(
		'points'=>$points,
		'eventID'=>$eventID,
		'yMDH'=>$yMDH
	))->fetchAll();
	return $result;
}

function getLastCalculated2($eventID){
	$result = dbQuery("
		SELECT lastCalculated2
		FROM events
		WHERE eventID =:eventID
	", array(
		'eventID'=>$eventID
	))->fetchAll();
	return $result;
}
