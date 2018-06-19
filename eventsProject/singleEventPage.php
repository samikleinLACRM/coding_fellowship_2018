<?php
include('config/config.php');
include('config/init.php');

$event=getOneEvent(3); //should be $_REQUEST
$categories=getCatsForThisEvent(3);
$usersGoing=getUsersGoingToThisEvent(3);

echoHeader($event['name'], null);


// <div class='centeredPictureText'>
// <div class='row'>
// 	<div class='left'>
// 		$event[votes]
// 	</div>
// 	<div class='right'>
// 		$event[name]
// 	</div>
// </div>

//<div class='centeredPictureText'>$event[votes] $event[name]</div>

echo "

	<h1>something will prob go here</h1>


	<div class='whiteBox'>


	<div class='container'>
		<img class='centerImage' src='$event[pic]' alt='Obama' height=500>
		<div class='centeredPictureText'>$event[votes] $event[name]</div>
	</div>




		<br>
		<div class='coloredOutline'>
			<p>COME B/C: $event[comeBc]</p>
		</div>

		<div class='dateTime'>
			<p> <img class='iconAligned' src='/pics/location.jpg' alt='location' height=40px> $event[location]</p>
			<p> <img class='iconAligned' src='/pics/time.jpg' alt='time' height=40px> $event[dateOfEvent], $event[startTime]-$event[endTime]</p>
		</div>

		<br>

		<div style='margin:20px'>
			<p class='heading'> Description: </p>
			<p style='font-size:18px'> $event[description] </p>
		</div>

		<br><br>

		<div class='row'>
	  		<div class='column'>
				<p class='heading'>Categories:</p>";

				foreach ($categories as $category) {
					echo "
					<div style='background-color:$category[color]; border-radius:15px; margin-left:100px; margin-right:100px; padding:5px;'>
						$category[name]
					</div>
					<br>";
				}

			echo"
			</div>
			<div class='column'>
				<p class='heading'>People Going:</p>";

				foreach ($usersGoing as $oneUserGoing) {
					echo $oneUserGoing['username'];
					echo "<br>";
				}

				echo"
			</div>
		</div>

	</div>






";
