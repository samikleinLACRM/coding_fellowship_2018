<!--
<script type='text/javascript'>

function upVoteNumber(eventID){

	console.log("hey we r in the function maybe?");
	// var varEventID = eventID;
	// <?php $event=getOneEvent(eventID);?>
	//890-76t
	// var varEventVotes = "<?php echo $event['votes'];?>";
	//
	// $.post('/ajax/upVoteAjax.php', {eventVotes:varEventVotes, eventID:varEventID}).(function(data) {
	// 	console.log(data);
	// 	document.getElementById("votes").innerHTML = data;
	// 	// alert("Data Loaded: " + data);
	// });

}

</script>


<script type='text/javascript'>

function downVoteNumber($eventID){

	var varEventID = "<?php echo $eventID; ?>";
	<?php $event=getOneEvent($eventID);?>

	var varEventVotes = "<?php echo $event['votes'];?>";

	$.post('/ajax/downVoteAjax.php', {eventVotes:varEventVotes, eventID:varEventID},).done(function(data) {
		console.log(data);
		document.getElementById("votes").innerHTML = data;
		// alert("Data Loaded: " + data);

	}).fail(function(data) {
		console.log('Error: ' + data);
	});

}

</script> -->
