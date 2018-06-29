

<?php
include('config/init.php');

if(!@$_REQUEST['eventID']){
	wrongPage();
}

$eventID=($_REQUEST['eventID']);
$event=getOneEvent($eventID);
$categories=getCatsForThisEvent($eventID);
$usersGoing=getUsersGoingToThisEvent($eventID);

$creator=getWhoCreatedEvent($_REQUEST['eventID']);

echoHeader($event['name'], null);

// $myEventVotes=$event['votes'];

// echoNicely($event['votes']);
// die();




echo "
	<div class='whiteBox'>


	<div class='container'>
		<img class='centerImage' src='$event[pic]' alt='$event[name]' height=500>

		<div class='centeredPictureText' style='border: 5px solid #521f66;'>
			<div class='titleWithVotes'>
				<div class='voteColumn' style='font-size:20px'>
					<br>";
					echoUpVoteButton($eventID);
					echo "<br><br>
					<div id='votes'>
						$event[votes]
					</div>
					<br>";
					echoDownVoteButton($eventID);
					echo "
				</div>
				<div class='bodyColumn'>
					<div style='margin-top: 15%'>
						$event[name]
					</div>
				</div>
			</div>
		</div>

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
		<hr>

		<div style='margin:20px'>
			<p class='heading'> Description: </p>
			<p style='font-size:18px'> $event[description] </p>
		</div>

		<br>
		<hr>
		<br>

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

		<hr>
		<br>

		<p> Event Created By: $creator[username]</p>
		<p> Contact: $creator[email]</p>
	</div>
";
