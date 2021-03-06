
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


function intakeVote(eventID, direction, session){

	if(session==null){
		alert("Oops! Since you are not logged in, your vote will not be saved.");
	}

	//both buttons haven't been pressed
	if(getCurrentVoteDirection(eventID)=="no vote"){
		jsVote(eventID, direction, null);
	}

	else if(getCurrentVoteDirection(eventID)==direction){
		undoVote(eventID, direction, null);
	}

	else{ //getCurrentVoteDirection = opposite direction than it is rn,
		undoVote(eventID, direction, "double");
		jsVote(eventID, direction, "double");
	}
}


function jsVote(eventID, direction, ifBoth){

	var total = getCurrentVoteTotal(eventID);
	console.log("before you voted = " +total);

	var sign = 1;
	if (direction == "down"){
		sign = -1;
	}

	document.getElementById(direction+"VoteButton_"+eventID).classList.add('voted');
	document.getElementById("eventWrapper_"+eventID).innerHTML = (total+sign);
	console.log("after you voted = " +(total+sign));

	$.post({ url:'/ajax/ajaxVote.php', data:{eventID, direction, ifBoth}});

}


function undoVote(eventID, direction, ifBoth){

	total = getCurrentVoteTotal(eventID);
	console.log("before you voted = " +total);

	var sign = 1;
	var buttonDirection = "down";

	if((direction=="up" && ifBoth==null) || (direction=="down" && ifBoth=="double")){ //this is the weird part. just take it.
		buttonDirection = "up";
		sign = -1;
	}

	document.getElementById(buttonDirection+"VoteButton_"+eventID).classList.remove('voted');
	document.getElementById("eventWrapper_"+eventID).innerHTML = total+sign;
	console.log("after you voted = " +(total+sign));

	if(ifBoth == null){ //only do an ajax call to undo this if there isn't an additional vote being registered
		$.post({ url:'/ajax/ajaxUndoVote.php', data:{eventID, direction, ifBoth}});
	}
}


function onclickDeleteEvent(eventID){
	location.href = "deleteEvent.php?eventID="+eventID;
}
