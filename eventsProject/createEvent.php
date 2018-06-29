<?php
include('config/init.php');


if(isset($_SESSION['userID'])){
	$pageName="Create Your Own Event!";
}
else{
	$pageName=null;
}


echoHeader("Create Your Own Event", $pageName);

if(!isset($_SESSION['userID'])) {  //&& !empty($_SESSION['userID']) <-- had this before. not sure if necessary
	echo "
	<div class= 'textStyle form'>
		Sorry! You must be logged in to create an event. Please log in here:
		<br><br>
		<a href='logInEP.php'>Log In</a>
	</div>
	";
	die();
}


//form
$Errors = array();
if(isset($_REQUEST['CreateEvent'])){ //
	areWordsInField('Name');
	areWordsInField('Location');
	areWordsInField('Date');
	areWordsInField('StartTime');
	areWordsInField('EndTime');
	areWordsInField('ComeBC');
	areWordsInField('Description');

	if(sizeof($Errors) == 0){
		insertEvent(
			$_REQUEST['Name'],
			$_REQUEST['Location'],
			$_REQUEST['Date'],
			$_REQUEST['StartTime'],
			$_REQUEST['EndTime'],
			$_REQUEST['ComeBC'],
			$_REQUEST['Description']
		);
		header("Location: eventCreated.php");
		exit();
	}
}




//echo's form
echo "
<div class='textStyle form'>
	<div style='color:red'>";
	if(sizeof($Errors) > 0){
		foreach($Errors as $Index=>$Error){
			echo "*$Index $Error<br>";
		}
	}
echo "
	</div>
	<p style='font-size:18px'>Create Event:</p>
	<form action='' method='post'>
	Name of event: <input type='text' name='Name' value='".@$_REQUEST['Name']."'/><br />
	<br>
	Location: <input type='text' name='Location' value='".@$_REQUEST['Location']."'/><br />
	<br>
	Date of event: <input type='date' name='Date' value='".@$_REQUEST['Date']."'/><br />
	<br>
	Start time of event: <input type='text' name='StartTime' value='".@$_REQUEST['StartTime']."'/><br />
	<br>
	End time of event: <input type='text' name='EndTime' value='".@$_REQUEST['EndTime']."'/><br />
	<br>
	Come BC: <input type='text' name='ComeBC' value='".@$_REQUEST['ComeBC']."'/><br />
	<br>
	<br>
	Event Description:
	<br>
	<textarea cols='40' rows='8' name='Description'>".@$_REQUEST['Description']."</textarea>
	<br>
	<input type='submit' name='CreateEvent' value='Create Event' />


	</form>
</div>
";




 ?>
