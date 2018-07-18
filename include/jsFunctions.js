
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
		$.post({ url:'/ajax/ajaxUndoVote.php', data:{eventID, direction, ifBoth} } ) ;
	}
}


function onclickDeleteEvent(eventID){
	location.href = "deleteEvent.php?eventID="+eventID;
}




//friendship functions

function intakeFriendship(userID1, userID2, friendWord){
	if(friendWord == "FRIEND"){
		createFriendship(userID1, userID2);
		// instead of automatically creating the friendship, would lead to another function that
		// 		sends a notification to the user, asking to be friends. then if presses accepts,
		//		then create the friendship
	}
	else {
		deleteFriendship(userID1, userID2);
		// also, if more complex, pop up an alert that says "are you sure you want to do this?"
	}
}

function createFriendship(userID1, userID2){
	document.getElementById("friendButton").classList.add('friended');
	document.getElementById("friendButton").innerHTML = "FRIENDS";
	$.post('/ajax/ajaxCreateFriendship.php', {userID1, userID2}, function(contentEchoedFromServer){
		console.log(contentEchoedFromServer);
		$('#confirmContentFromServer').html(contentEchoedFromServer);
		})
}

function deleteFriendship(userID1, userID2){
	document.getElementById("friendButton").classList.remove('friended');
	document.getElementById("friendButton").innerHTML = "FRIEND";
	$.post('/ajax/ajaxDeleteFriendship.php', {userID1, userID2},function(contentEchoedFromServer){
		$('#confirmContentFromServer').html(contentEchoedFromServer);
		})
}
