<?php
include('config/init.php');

echoHeader("Profile Page", null);

// var_dump(isset($_SESSION['userID']));

if(!isset($_SESSION['userID'])){
	echo "<div class='textStyle form'>
	Sorry! You must be logged in to view your profile. Please log in here:
	<br><br>
	<a href='logInEP.php'>Log In</a>
	";
	die();
}

$user=getUserByUserID($_REQUEST['userID']);
//NEED TO DO MORE VERIFICATION ON THIS! - actually wait, should be fine. bc should be able to see anyone's

$eventsGoingTo=getAllEventsThisUserIsGoingTo($user['userID']);
$eventsCreated=getAllEventsThisUserCreated($user['userID']);
$friends=getAllThisUsersFriends($user['userID']);


echo "

<div class='whiteBox'>
";

//this is the rlly imp part
if ($_SESSION['userID'] == $user['userID']){
	echo "<br>
	<div style='font-size:20px; background-color:#19e8e4; text-align:center; margin-left:200px; margin-right:200px; border-radius:15px;'>
		<a href='editAccount.php?userID=$_SESSION[userID]'>EDIT YOUR ACCOUNT</a>
	</div>
	<br>";
}

echo"
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
			if ($eventsGoingTo == null) {
				echo "Going to 0 events";
			}
			else {
				foreach ($eventsGoingTo as $event) {
				// var_dump($event);
				echo "
				<div class='row accountColumn' style='border:solid; margin:10px;'>";

				echoEvent($event);
				echo "


				</div>";
			}
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

					echo "

					<div class='friendBox'>
						<div style='float:left; overflow:auto;'>
							<img src='/pics/smiley.jpg' alt='Smiley face' width='50' height='50'>
						</div>
						<div class='friendName'>
							<a href='accountPage.php?userID=$friend[userID]'>$friend[username]</a>
						</div>
					</div>

					";
				}
			}


			echo "
		</div>

	</div>


</div>
";



 ?>
