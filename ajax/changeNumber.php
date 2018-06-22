<?php
// This is the server-side script.

// Set the content type.
// header('Content-Type: text/plain');

// Send the data back.
// echo "This is the output.";

// upVote($_REQUEST['eventID']);

// $eventVotes=$_REQUEST['eventVotes']


$holder= $_REQUEST['eventVotes'];
$holder++;
echo $holder;
// echo $eventVotes;

//whatever u echo becomes data
?>

<!-- <?php echo json_encode( array( "name"=>"John","time"=>"2pm" ) );
?> -->
