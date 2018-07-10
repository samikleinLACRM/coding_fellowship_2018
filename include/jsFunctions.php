<!-- <?php

$userID=$_SESSION['userID'];

?> -->


<script type='text/javascript'>

function togglePasswordVisibility(){
	var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


function getCurrentVoteDirection(eventID){
	if(!document.getElementById("upVoteButton_"+eventID).classList.contains('voted') && !document.getElementById("downVoteButton_"+eventID).classList.contains('voted')){
		return "no vote";
	}
	else if(!document.getElementById("upVoteButton_"+eventID).classList.contains('voted') && document.getElementById("downVoteButton_"+eventID).classList.contains('voted')){
		return "down";
	}
	else {
		return "up";
	}
}

function getCurrentVoteTotal(eventID){
	var insideTheDiv = document.getElementById("eventWrapper_"+eventID).innerHTML;
	return parseInt(insideTheDiv);
}


function intakeVote(eventID, direction){

	//I assumed there are 3 options: either your straight up voting,
	//	you're undoing a vote, or your undoing and voting.
	// var x = getUserID();
	// console.log(x);
	//both buttons haven't been pressed
	if(getCurrentVoteDirection(eventID)=="no vote"){
		jsVote(eventID, direction);
	}

	else if((getCurrentVoteDirection(eventID)=="down" && direction=="down") ||(getCurrentVoteDirection(eventID)=="up" && direction == "up")){
		undoVote(eventID, direction, null);
	}

	else{
		undoVote(eventID, direction, "double");
		jsVote(eventID, direction);
	}
}


function jsVote(eventID, direction){

	total = getCurrentVoteTotal(eventID);
	console.log("before you voted = " +total);

	if(direction == "up"){
		document.getElementById("upVoteButton_"+eventID).classList.add('voted');
		document.getElementById("eventWrapper_"+eventID).innerHTML = total+1;
		console.log("after you voted = " +(total+1));
	}

	else{ //aka direction == "down"
		document.getElementById("downVoteButton_"+eventID).classList.add('voted');
		document.getElementById("eventWrapper_"+eventID).innerHTML = total-1;
		console.log("after you voted = " +(total-1));
	}

	$.post({ url:'/ajax/ajaxVote.php', data:{eventID, direction}});

}


function undoVote(eventID, direction, ifUndoAndVote){

	total = getCurrentVoteTotal(eventID);
	console.log("before you voted = " +total);

	if((direction=="up" && ifUndoAndVote==null) || (direction=="down" && ifUndoAndVote=="double")){ //this is the weird part. just take it.
		document.getElementById("upVoteButton_"+eventID).classList.remove('voted');
		document.getElementById("eventWrapper_"+eventID).innerHTML = total-1;
		console.log("after you voted = " +(total-1));
	}
	else{
		// byID("down", eventID, "remove");
		document.getElementById("downVoteButton_"+eventID).classList.remove('voted');
		document.getElementById("eventWrapper_"+eventID).innerHTML = total+1;
		console.log("after you voted = " +(total+1));
	}

	$.post({ url:'/ajax/ajaxUndoVote.php', data:{eventID, direction, ifUndoAndVote}});
}


//
// function getUserID(){
// 	var userID = '<%= Session["userID"] %>';
//     alert(userID);
// }



//not sure if Tyler also meant to function out every one of those document.getelement calls... but if so that's how I would do it
// function byID(direction, eventID, action){
//
//    bc doesn't like the . with a variable like action
// 	if (action == "remove"){
// 		document.getElementById(direction+"VoteButton_"+eventID).classList.remove('voted');
// 	}
// if (action == "contains"){
// }
// if (action == "add"){
// }


</script>
