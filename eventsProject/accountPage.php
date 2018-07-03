<?php
include('config/init.php');

echoHeader("Profile Page", null);

if(!isset($_SESSION['userID'])){
	echo "<div class='textStyle form'>
	Sorry! You must be logged in to view your profile. Please log in here:
	<br><br>
	<a href='logInEP.php'>Log In</a>
	";
	die();
}

$user=getUserByUserID($_SESSION['userID']);
$eventsGoingTo=getAllEventsThisUserIsGoingTo($user['userID']);
$eventsCreated=getAllEventsThisUserCreated($user['userID']);
$friends=getAllThisUsersFriends($user['userID']);


echo "

<div class='whiteBox'>


	<div class='bioBox' style='margin:50px;'>
		<div style='float:left'>
			<img src='/pics/smiley.jpg' alt='Smiley face' width='200' height='200'>
		</div>
		<div class='bioWords'>
			<p style='font-size:25px'>$user[displayName] [friend button]</p>
			<p>$user[class]</p>
			<p>$user[bio]</p>
		</div>
	</div>
	<br>
	<br>

	<div class='row'>
		<div class='bioColumn left'>

			<div class='headingBox'>
				Upcoming Events
			</div>
			<br>";

			foreach ($eventsGoingTo as $event) {
				// var_dump($event);
				echo "
				<div class='row accountColumn' style='border:solid; margin:10px;'>";

				echoEvent($event);
				echo "


				</div>";
			}

			echo "
		</div>
		<div class='bioColumn right'>

			<div class='headingBox'>
				Events Created
			</div>
			<br>

			<div class='eventsCreatedBox'>
			";

			if ($eventsCreated == null) {
				echo "0 events created";
			}
			else{
				foreach ($eventsCreated as $event) {
					// var_dump($event);
					echo "
					<div class='row accountColumn' style='border:solid; margin:10px;'>";

					echoEvent($event);
					echo "


					</div>

					";
				}
			}

			//can't just do br, need an actual fix
			echo "
			</div>
			<br>
			<div class='headingBox'>
				Friends
			</div>
			<br>
			<div class='friends'>
			";

			if ($friends == null) {
				echo "No friends yet";
			}
			else{
				foreach ($friends as $friend) {
					// var_dump($event);
					echo "
					<div class='singleFriend'>";

					echo $friend['username'];
					echo "
					</div>
					<br>
					";
				}
			}


			echo "
		</div>

	</div>


</div>
";



 ?>
