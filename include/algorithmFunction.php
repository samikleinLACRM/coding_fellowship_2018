<?php


function calculatePoints($event){

	$points = 0;

	// these both get in the format of 'July 24, 2018'
	$eventDate=formatDateToCalculate($event['dateOfEvent']);
	$todayDate= date("F j, Y");
	// echoNicely($todayDate);
	// echoNicely($eventDate);


	//it's working
	// if($eventDate==$todayDate){
	// 	echo "same day";
	// }
	// else{
	// 	echo "diff day";
	// }

	if($eventDate==$todayDate){
		$points = $points +500;
	}



	echoNicely($event['dateOfEvent']); //good
	// echoNicely($todayDate);

	$ddate = date('Y-m-d H:i:s');

	echoNicely($ddate);

	echo dateDifference($ddate, $event['dateOfEvent']);


	//at the end, need to update field called points? w this number?
	//but will it re-run every day?

}


function dateDifference($date_1 , $date_2 , $differenceFormat = '%R%a' ){
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);

}
