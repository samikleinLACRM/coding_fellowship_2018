<?php

include('config/init.php');

echoHeader("Delete Event", "Delete Event");


echo "
<div class='textStyle form'>
	<div style='color:red; font-size:25px;'>
		ARE YOU SURE YOU WANT TO DELETE THIS EVENT? THIS ACTION CANNOT BE UNDONE.
	</div>

	<br><br>
	<a href='singleEventPage.php?eventID=$_REQUEST[eventID]'>[Go back to Event]</a>
	<br><br>
	<a href='loggedOutEP.php'>Delete Event</a>
</div>
";


?>
