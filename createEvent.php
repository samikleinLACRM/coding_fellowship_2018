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
	echoNotLoggedIn("You must be logged in to create an event.");
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
			$_REQUEST['Description'],
			$_REQUEST['pic']
		);
		//get the event ID of the new event from the database
		//foreach category name, insert the unique combo
		// into the cat2events database
		$allCategories=getAllCategories();
		$newEvent=getAnEventByNameAndDate($_REQUEST['Name'], $_REQUEST['Date']);
		foreach($allCategories as $category){
			if (isset($_REQUEST[$category['name']] ))  {
				// echo $category['name'];
				// echo $category['catID'];
				insertCatCombo($newEvent['eventID'], $category['catID']);
			}
		}
		$newEventID = $newEvent['eventID'];
		header("Location: eventCreated.php?eventID=$newEventID");
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
$allCategories=getAllCategories();
echo "
	</div>
	<br>
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
	<br><br>
	Picture (type in a URL link to a .jpg file):<input type='text' name='pic' value='".@$_REQUEST['pic']."'>
	<br><br><br>
	<div style='font-size:20px;'
		<strong>Categories:</strong><br><br>
	</div>
	<div style='margin-left:100px; margin-right:100px;'>";
		foreach ($allCategories as $category) {
			echo "
			<input type='checkbox' name=$category[name] value='category'>$category[name]";
			echo " &nbsp&nbsp";
		}
	echo"
	</div>
	<br>
	<div style='color:blue'>
		*<a href='createCategory.php'>Create your own category!</a>
	</div>
	<br><br><br>
	<input type='submit' name='CreateEvent' value='Create Event' />
	</form>
</div>
";
 ?>
