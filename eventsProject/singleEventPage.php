<?php
include('config/config.php');
include('config/init.php');


if(!@$_REQUEST['eventID']){
	wrongPage();
}

$eventID=($_REQUEST['eventID']);
$event=getOneEvent($eventID);
$categories=getCatsForThisEvent($_REQUEST['eventID']);
$usersGoing=getUsersGoingToThisEvent($_REQUEST['eventID']);

$creator=getWhoCreatedEvent($_REQUEST['eventID']);

echoHeader($event['name'], null);

$myEventVotes=$event['votes'];

?>
<script type='text/javascript'>

function upVoteNumber(){

	var varEventVotes = "<?php echo $myEventVotes ?>";
	var varEventID = "<?php echo $eventID ?>";

	$.post('/ajax/upVoteAjax.php', {eventVotes:varEventVotes, eventID:varEventID},).done(function(data) {
		console.log(data);
		document.getElementById("votes").innerHTML = data;
		// alert("Data Loaded: " + data);

	}).fail(function(data) {
		console.log('Error: ' + data);
	});

}


function downVoteNumber(){

	var varEventVotes = "<?php echo $myEventVotes ?>";
	var varEventID = "<?php echo $eventID ?>";

	$.post('/ajax/downVoteAjax.php', {eventVotes:varEventVotes, eventID:varEventID},).done(function(data) {
		console.log(data);
		document.getElementById("votes").innerHTML = data;
		// alert("Data Loaded: " + data);

	}).fail(function(data) {
		console.log('Error: ' + data);
	});

}

</script>

<?php

echo "
	<div class='whiteBox'>


	<div class='container'>
		<img class='centerImage' src='$event[pic]' alt='$event[name]' height=500>

		<div class='centeredPictureText' style='border: 5px solid #521f66;'>
			<div class='titleWithVotes'>
				<div class='voteColumn' style='font-size:20px'>
					<br>
					<a href='#' onclick='upVoteNumber();'><img class='iconAligned' style='background-color:white' src='/pics/arrow2.jpg' alt='arrow' height=40px></a>
					<br><br>
					<div id='votes'>
						$event[votes]
					</div>
					<br>
					<a href='#' onclick='downVoteNumber();'><img class='iconAligned' style='background-color:white' src='/pics/line2.jpg' alt='line' height=40px></a>
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
