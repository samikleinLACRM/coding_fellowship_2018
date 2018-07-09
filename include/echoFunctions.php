<?php


function echoHeader($Title, $PageName) {

	?>
	<script src="/include/jquery.js"></script>
	<?php

	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>
			<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Quicksand'>
			<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet'>
		</head>

";
?>

<script type='text/javascript'>

function togglePasswordVisibility(){
	var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function intakeVote(eventID, userID, direction){

//both buttons haven't been pressed
	if(!document.getElementById("upVoteButton_"+eventID).classList.contains('voted') && !document.getElementById("downVoteButton_"+eventID).classList.contains('voted')){
		if(direction == "up"){
			jsUpVote(eventID, userID, direction);
		}
		else{ //direction is down
			jsDownVote(eventID, userID, direction);
		}
	}

//if vote exists

	//the downvote has been pressed but not the upvote
	else if(!document.getElementById("upVoteButton_"+eventID).classList.contains('voted') && document.getElementById("downVoteButton_"+eventID).classList.contains('voted')){
		if(direction == "up"){
			undoDownVote(eventID, userID, direction, "double");
			jsUpVote(eventID, userID, direction);
		}
		else{ //direction is down
			undoDownVote(eventID, userID, direction, null);
		}
	}

	//the upvote has been pressed but not the downvote
	else{
		if(direction == "up"){
			undoUpVote(eventID, userID, direction, null);
		}
		else{ //direction is down
			undoUpVote(eventID, userID, direction, "double");
			jsDownVote(eventID, userID, direction);
		}

	}
}



function jsUpVote(eventID, userID, direction){
	//update UI so gets unvoted,
	//ajax request to unvote this in the server.
	document.getElementById("upVoteButton_"+eventID).classList.add('voted');

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber+1;
	console.log("after you voted = " +(pureNumber+1));
	// console.log(eventID, userID, direction);

	//call ajax
	$.post({ url:'/ajax/ajaxVote.php', data:{eventID, userID, direction}});

}


function jsDownVote(eventID, userID, direction){

	document.getElementById("downVoteButton_"+eventID).classList.add('voted');

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber-1;
	console.log("after you voted = " +(pureNumber-1));

	//call ajax
	$.post({ url:'/ajax/ajaxVote.php', data:{eventID, userID, direction}});

}

function undoUpVote(eventID, userID, direction, ifUndoAndVote){

	document.getElementById("upVoteButton_"+eventID).classList.remove('voted');

	// i think this just means downvote - like thats how u get rid of the upvote

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber-1;
	console.log("after you voted = " +(pureNumber-1));

	$.post({ url:'/ajax/ajaxUndoVote.php', data:{eventID, userID, direction, ifUndoAndVote}});
}

function undoDownVote(eventID, userID, direction, ifUndoAndVote){

	document.getElementById("downVoteButton_"+eventID).classList.remove('voted');

	//gets the number
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	var pureNumber = parseInt(insideTheDiv);
	console.log("before you voted = " +pureNumber);

	//changes the number in the UI
	document.getElementById("eventWrapper_"+eventID).innerHTML = pureNumber+1;
	console.log("after you voted = " +(pureNumber+1));

	$.post({ url:'/ajax/ajaxUndoVote.php', data:{eventID, userID, direction, ifUndoAndVote}});
}


</script>

<?php

echo"

		<body class='background'>

			";
			echoNavBar();
			if ($PageName!=null) {
				echo "
				<br>
				<div class='bloghead'>
					$PageName
				</div>
				";
			}
}



function wrongPage($message){
	echoHeader("Wrong Page!", "Wrong Page!");
	echo "<p class='textStyle' style='text-align:center'>Oops! 404 Error. You've reached the wrong page. $message <p>";
	// echoFooter();
	die("");
}



function echoDate($dateFromMySQL){

	echo date_format($dateFromMySQL, 'g:ia \o\n l jS F Y');
#output: 5:45pm on Saturday 24th March 2012


}

function echoNavBar(){
	echo "
	<div class='textStyle form'>
		<a href='index.php'>Trending Events</a> ||
		<a href='logInMenuEP.php'>Log In Menu</a> ||
		<a href='accountPage.php?userID=".@$_SESSION['userID']."'>Profile</a> ||
		<a href='createEvent.php'>Create Event</a>
	</div>
	";
}



//
// function echoFooter(){
// 	echo "
// 		<div class='row right footer'>
// 			Sami Klein <br>
// 			email: sami.klein@wustl.edu <br>
// 		</div>
// </body>
// 	";
// }
//
//
function echoNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}
//
//
// function echoJustDate($date){
// 	$timestamp = strtotime($date);
// 	$realDate = date('d-m-Y', $timestamp);
// 	return $realDate;
// }


?>
