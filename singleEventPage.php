<?php
include('config/init.php');

if(!@$_REQUEST['eventID']){
	wrongPage("No event selected.");
}

$eventID=($_REQUEST['eventID']);
$event=getOneEvent($eventID);
$categories=getCatsForThisEvent($eventID);

$creator=getEventCreator($_REQUEST['eventID']);

echoHeader($event['name'], null);


if(isset($_SESSION['userID'])){
	if ($creator['userID'] == $_SESSION['userID']){
		echo "
		<div style='margin-right:17.5%;'>
			<button type='button' onclick='location.href = \"editEvent.php?eventID=$_REQUEST[eventID]\"'; class='editEventButton'>Edit Your Event</button>
		</div>
		<br><br><br><br>
		";

	}
}

echo "
<div class='whiteBox'>";


	//tells it if going or nah
	$goingColor = null;
	$goingWord = "Going";

	if(isset($_SESSION['userID'])){
		$ifGoing = getIfGoing($_SESSION['userID'], $eventID);
		if ($ifGoing !=null){
			$goingColor = "userGoing";
			$goingWord = "✓Going";
		}
	}

	$savedColor = null;
	$savedWord = "Save (private)";

	if(isset($_SESSION['userID'])){
		$ifSaved = getIfSaved($_SESSION['userID'], $eventID);
		if ($ifSaved !=null){
			$savedColor = "saved";
			$savedWord = "✓Saved (private)";
		}
	}


echo "
	<div class='container'>
		<img class='centerImage' src='$event[pic]' alt='$event[name]' height=500>

		<div class='centeredPictureText' style='border: 5px solid #521f66;'>
			<div class='titleWithVotes'>
				<div class='voteColumn' style='font-size:20px'>
					<br>";

					$upVoted = null;
					$downVoted= null;
					if(isset($_SESSION['userID'])){
						$vote = doesUserVoteExist($eventID, $_SESSION['userID']);
						if ($vote !=null){
							if ($vote['0']['direction'] == "up"){
								$upVoted="voted";
							}
							else{ //which means that direction must be down
								$downVoted="voted";
							}
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
";


// if(!isset($_SESSION["userID"])){
// 	$_SESSION["userID"] = null;
// }

echo"
		<div class='dateTime'>
			<p> <img class='iconAligned' src='/pics/location.jpg' alt='location' height=40px> $event[location]</p>
			<p> <img class='iconAligned' src='/pics/time.jpg' alt='time' height=40px>"; echo " ";echoDate($event['dateOfEvent']); echo" <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @ $event[startTime]-$event[endTime]</p>
			<div class='display:inline-block;'>
				<button type='button' onclick=\"".@"intakeGoing($_SESSION[userID], $event[eventID]);\" id='goingButton' class='$goingColor'>$goingWord</button>
				<button type='button' onclick=\"".@"intakeSave($_SESSION[userID], $event[eventID]);\" id='saveButton' class='$savedColor'>$savedWord</button>
			</div>
		</div>

		<br>
		<hr>

		<div class='description'>
			<p class='heading'> <strong>Description: </strong></p>
			<p style='font-size:18px'> $event[description] </p>
		</div>

		<br>
<hr>
		<br>";

		echo"

		<div class='row'>
	  		<div class='column'>
				<p class='heading'>Categories:</p>";

				foreach ($categories as $category) {
					echo "
					<div style='background-color:$category[color]; border-radius:15px; margin-left:100px; margin-right:100px; padding:5px;'>

						<a href='sortBy.php?catID=$category[catID]'>$category[name]</a>


					</div>
					<br>";
				}



			echo"
			</div>
			<div id=confirmGoing>";
				echo echoGoing($event['eventID']);
				echo "
			</div>
		</div>

		<hr>


		<div class='description' style='margin-top:30px;'>
			<p> Event Created By: <a href='accountPage.php?userID=$creator[userID]'>$creator[username]</a></p>
			<p> Contact: <a href='mailto:$creator[email]'>$creator[email]</a></p>
		</div>
	</div>
";

echoFooter();
