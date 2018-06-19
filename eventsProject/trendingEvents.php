<?php

include('config/config.php');
include('config/init.php');

echoHeader("Trending Events", null);

echo "
<div class='bloghead'>
	Trending Events
</div>
";

$allButTopThree=getAllEventsButTopThree();
$topThree=getTopThreeEvents();
$event=getOneEvent($topThree[1]['eventID']); //should be $_REQUEST

// for($i=0; $i<count($allButTopThree); $i++){
// 	echo "hey";
//
// 	if (i%3 === 0){
// 		//print column 1
// 		//echoColumnOne -- create this
// 	}
// 	if (i%3 === 1){
// 		//pring column 2
// 	}
// 	if (i%3 === 2){
// 		//print column 3
// 	}
//
// }
// var_dump(count($allButTopThree));
// die("test");

echo "
<p> <img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px></p>
<p> <img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px></p>

";


// <div class='testGrid'>
//   <div class='areaA'>A</div>
//   <div class='areaB'>B</div>
// </div>

echo "






<div class='eventCard'>
	hey
</div>
<div class='eventCard'>
	hey
</div>
<div class='eventCard'>
	hey
	<div class='verticalLine'></div>
	more words
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div class='row' style='margin-left:10%; margin-right:10%; '>
	<div class='trendingColumn'>
		<div class='voteColumn'>
			<p> <img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px></p>
			$event[votes]
			<p> <img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px></p>
		</div>
		<div class='nextToVote'>
			<h2>Column 1</h2>
			<p>Some text..</p>
		</div>
	</div>

	<div class='trendingColumn' style='margin-left:5%; margin-right:5%;'>
    	<div class='voteColumn'>
			<p> <img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px></p>
			$event[votes]
			<p> <img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px></p>
		</div>
		<div class='nextToVote'>
			<h2>Column 2</h2>
			<p>Some text..</p>
		</div>
	</div>
	<div class='trendingColumn'>
		<div class='voteColumn'>
			<p> <img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px></p>
			$event[votes]
			<p> <img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px></p>
		</div>
		<div class='nextToVote'>
			<h2>Column 3</h2>
			<p>Some text..</p>
		</div>
	</div>
</div>




";
