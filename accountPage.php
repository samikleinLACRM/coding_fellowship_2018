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



//tells it if friended or nah
$friendedColor = null;
$friendWord = "FRIEND";

$stringNum = $_REQUEST['userID'];
$requestUserID = (int)$stringNum;

if(isset($_SESSION['userID'])){ // && $_SESSION['userID'] != $_REQUEST['userID'] <-- actually don't think necessary, bc just changing varibales, and if the variables arent used, then doesnt matter
	$friendship = doesFriendshipExist($_SESSION['userID'], $requestUserID);
	if ($friendship !=null){
		$friendedColor = "friended";
		$friendWord = "FRIENDS";
	}
}

// $nfdjk= doesFriendshipExist($requestUserID, $_SESSION['userID']);
// echoNicely($friended);
// die();


echo"
	<div class='bioBox' style='margin:50px;'>
		<div style='float:left'>
			<img src='/pics/smiley.jpg' alt='Smiley face' width='200' height='200'>
		</div>
		<div class='bioWords'>
			<div style=''>
				<p style='font-size:25px'>$user[displayName] </p>";

				//only print a friend button if it's not your page
				if($_SESSION['userID'] != $_REQUEST['userID']){
					echo"
					<button type='button' onclick=\"intakeFriendship($_SESSION[userID], $requestUserID, '$friendWord');\" id='friendButton' class='$friendedColor'>$friendWord</button>";
				}
				echo"
			</div>
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
			<br>
			<div id='confirmUpcoming'>
			";
				echo3EventsGoingTo($_REQUEST['userID']);
				echo "
			</div>";
			if(count(getAllEventsThisUserIsGoingTo($_REQUEST['userID'])) > 3){
				echo "
				<button type='button' onclick='intakeUpcomingClick($requestUserID)'; id='upcomingButton'>See All</button>";
			}

			if($_SESSION['userID'] == $user['userID']){
				echo "
				<br><br><br>
				<div class='headingBox'>
					Saved (Private)
				</div>";

				echoSavedEvents($_SESSION['userID']); //i guess could do request too, but just to be sure.

			}

			echo"
		</div>
		<div class='bioColumn right'>

			<div class='headingBox'>
				Events Created
			</div>

			<div class='eventsCreatedBox'>
				<div id='confirmCreated'>";
					echo3EventsCreated($_REQUEST['userID']);
			echo "
				</div>";
				if(count(getAllEventsCreated($_REQUEST['userID'])) > 3){
					echo "
					<button type='button' onclick='intakeEventsCreatedButton($requestUserID)'; id='eventsCreatedButton'>See All</button>";
				}
				echo"
			</div>
			<br>
			<div class='headingBox'>
				Friends
			</div>
			<br>
			<div class='friends'>
			";

			echo "<div id='confirmContentFromServer'> ";
				echoFriends($user['userID']);
			echo "</div>
		</div>

	</div>


</div>
</div>
";


echoFooter();
