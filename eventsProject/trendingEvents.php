<?php
include('config/init.php');


echoHeader("Trending Events", null);

echo "
<div class='bloghead'>
	Trending Events
</div>
";

$allEvents=getAllEvents();

$event1=$allEvents[0];
$event2=$allEvents[1];
$event3=$allEvents[2];

for ($i = 3; $i <count($allEvents); $i++){ //get top 3 events
	$allButTopThree[$i-3]=$allEvents[$i];
}

//print number1 event
echo "
<br><br><br>
	<div class='topEvent'>";
			echoEvent($event1);
		echo "</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

//print number2 & 3 event

echo "
<div class='row' style='margin-left:15%; margin-right:15%; '>
	<div class='secondTier'>";
		echoEvent($event2);
	echo"
	</div>
	<div class='secondTier eventThree'>";
		echoEvent($event3);
	echo "
	</div>
</div>
";



echo "
<br><br><br>
<div class='row' style='margin-left:10%; margin-right:10%; '>";
	for($i=0; $i<count($allButTopThree); $i++){

		$eventID=$allButTopThree[$i]['eventID'];

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
</div>";
