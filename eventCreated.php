<?php
include('config/init.php');

echoHeader("Event Created", "Event Created");

$event = getOneEvent($_REQUEST['eventID']);

echo"
<div class='textStyle form'>
	Event sucessfully created! Go to this link to see your event:
	<br><br>
	<div style='background-color:red; margin-left:100px; margin-right:100px;'>
		<strong><a href='singleEventPage.php?eventID=$_REQUEST[eventID]'>$event[name]</a></strong>
	</div>
</div>";

 ?>
