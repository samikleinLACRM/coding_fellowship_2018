<?php
include('config/init.php');

if(!isset($_REQUEST['eventID'])) {
	wrongPage("You have not selected an event to edit.");
}

$creator=getEventCreator($_REQUEST['eventID']);

if(!isset($_SESSION['userID'])){ //if username is not set
	wrongPage("You are not logged in.");
	if($_SESSION['userID']!==$creator){ //if someone is not the creator of this event
		wrongPage("You do not have permission to acsess this.");
	}
}


$eventEditing = getOneEvent($_REQUEST['eventID']);
echoHeader("Edit Your Event", null);
if(isset($_REQUEST['editEventForm'])){ //
	submitChangedEvent(
		$_REQUEST['eventID'],
		$_REQUEST['votes'],
		$_REQUEST['name'],  //these have to match the form
		$_REQUEST['location'],
		$_REQUEST['date'],
		$_REQUEST['startTime'],
		$_REQUEST['endTime'],
		$_REQUEST['comeBc'],
		$_REQUEST['description'],
		$_REQUEST['pic']
		);
		header("Location: singleEventPage.php?eventID=$_REQUEST[eventID]");
		exit();
}
//prob need to change the date later
echo "
<div class='textStyle form' style='padding:30px; background-color:#ffd5b5'>
	<form action='' method='post'>


		<div style='display:none'>
			Event ID: <input type='number' name='eventID' value='".$eventEditing['eventID']."'>
			<div style='color:red'>*Do not change the eventID</div>
			<br>
			Votes: <input type='number' name='votes' value='".$eventEditing['votes']."'>
		</div>

		Name of event: <input type='text' name='name' value='".$eventEditing['name']."'>
		<br><br>

		Location: <input type='text' name='location' value='".$eventEditing['location']."'>
		<br><br>

		Date: <input type='date' name='date' value='".$eventEditing['dateOfEvent']."'>
		<br><br>

		Start Time: <input type='text' name='startTime' value='".$eventEditing['startTime']."'>
		<br><br>

		End Time: <input type='text' name='endTime' value='".$eventEditing['endTime']."'>
		<br><br>

		Come BC: <textarea cols='30' rows='1' name='comeBc'>".$eventEditing['comeBc']."</textarea>
		<br><br>

		Description: <textarea cols='40' rows='8' name='description'>".$eventEditing['description']."</textarea>
		<br><br>

		Picture (type in a URL link to a .jpg file):<input type='text' name='pic' value='".$eventEditing['pic']."'>

		<br><br>

		<input type='submit' name='editEventForm' value='Submit your changes' />
	</form>
</div>
";
// echoFooter();
?>
