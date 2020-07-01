<?php


function calculatePoints($event){

	$points = 0;

	// these both get in the format of 'July 24, 2018'
	$shortEventDate=formatDateToCalculate($event['dateOfEvent']);
	$shortTodayDate= date("F j, Y");

	//00:00 format
	$fullEventDate = $event['dateOfEvent'];
	$fullTodayDate = date('Y-m-d H:i:s');

	$dateDiff= dateDifference($fullTodayDate, $event['dateOfEvent'])+1;
		//ps - something weird going on with the today's date and


	//NOTE: there is probably a better way to do this than a bunch of if statements,
	// 		but just doing this for now.

	if($shortEventDate==$shortTodayDate){ //event is today
		$points = $points +500;
	}

	$diff2points= array(
		'1'=>'450', '2'=>'350','3'=>'250','4'=>'300',
		'5'=>'100'
	);

	foreach ($diff2points as $key => $value){
		if($dateDiff == $key && $shortEventDate!==$shortTodayDate){ //bc today's date is weird
			$points = $points + $diff2points[$key];
		}
	}

	if(15>$dateDiff&&$dateDiff > 5){
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

	$usersGoing=getUsersGoingToThisEvent($event['eventID']);
	$numPeopleGoing = count($usersGoing);

	if($numPeopleGoing < 5){
		$points = $points -100;
	}
	else if(10 > $numPeopleGoing && $numPeopleGoing > 5){
		$points = $points +100;
	}
	else if(25 > $numPeopleGoing && $numPeopleGoing > 10){
		$points = $points +150;
	}
	else if($numPeopleGoing > 25){
		$points = $points +200;
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
