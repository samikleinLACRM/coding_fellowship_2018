<?php
include('config/config.php');
include('config/init.php');
 ?>
 
<script type='text/javascript'>

function upVoteNumber($myEventVotes, $eventID){

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


function downVoteNumber($myEventVotes, $eventID){

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
