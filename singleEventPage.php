<?php
include('config/init.php');

if(!@$_REQUEST['eventID']){
	wrongPage("No event selected.");
}

$eventID=($_REQUEST['eventID']);
$event=getOneEvent($eventID);
$categories=getCatsForThisEvent($eventID);
$usersGoing=getUsersGoingToThisEvent($eventID);

$creator=getEventCreator($_REQUEST['eventID']);

echoHeader($event['name'], null);

// $myEventVotes=$event['votes'];

// echoNicely($event['votes']);
// die();




echo "
	<div class='whiteBox'>";

	if ($creator['userID'] == $_SESSION['userID']){
		echo "<br>
		<div style='font-size:20px; background-color:#19e8e4; text-align:center; margin-left:200px; margin-right:200px; border-radius:15px;'>
			<a href='editEvent.php?eventID=$_REQUEST[eventID]'>EDIT YOUR EVENT</a>
		</div>
		<br>";
	}
echo "
	<div class='container'>
		<img class='centerImage' src='$event[pic]' alt='$event[name]' height=500>

		<div class='centeredPictureText' style='border: 5px solid #521f66;'>
			<div class='titleWithVotes'>
				<div class='voteColumn' style='font-size:20px'>
					<br>";

					$exists = doesUserVoteExist($eventID, $_SESSION['userID']);
					$upVoted = null;
					$downVoted= null;
					if ($exists !=null){
						if ($exists['0']['direction'] == "up"){
							$upVoted="voted";
						}
						else{ //which means that direction must be down
							$downVoted="voted";
						}
					}

					echoUpVoteButton($eventID, $upVoted);
					echo "<br><br>
					<div id='eventWrapper_$eventID'>
						$event[votes]
					</div>
					<br>";
					echoDownVoteButton($eventID, $downVoted);
					echo "
				</div>
				<div class='bodyColumn'>
					<div style='margin-top: 15%; padding:5px;'>
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

			$numPeopleGoing = count($usersGoing);
			if ($numPeopleGoing == 1){
				$ppl = "person";
			}
			else{
				$ppl = "people";
			}

			echo"
			</div>
			<div class='column'>
				<p class='heading'>Going ($numPeopleGoing $ppl): </p>";

				foreach ($usersGoing as $oneUserGoing) {
					echo "
					<div class='singleFriend'>
						<a href='accountPage.php?userID=$oneUserGoing[userID]'>$oneUserGoing[username]</a>
					</div>
					<br>";
				}

				echo"
			</div>
		</div>

		<hr>
		<br>

		<p> Event Created By: $creator[username]</p>
		<p> Contact: $creator[email]</p>";


		echo"
	</div>
";
