
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
	console.log("intaking friendship");
	if(document.getElementById("friendButton").classList.contains('friended')){
		console.log("about to DELTE a friendship");
		deleteFriendship(userID1, userID2);
		// also, if more complex, pop up an alert that says "are you sure you want to do this?"

	}
	else {
		console.log("about to CREATE a friendship");
		createFriendship(userID1, userID2);
		// instead of automatically creating the friendship, would lead to another function that
		// 		sends a notification to the user, asking to be friends. then if presses accepts,
		//		then create the friendship
	}
}

function createFriendship(userID1, userID2){
	document.getElementById("friendButton").classList.add('friended');
	document.getElementById("friendButton").innerHTML = "FRIENDS";
	$.post('/ajax/ajaxCreateFriendship.php', {userID1, userID2}, function(contentEchoedFromServer){
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

function intakeUpcomingClick(userID){
	console.log("intaking click");
	if(document.getElementById("upcomingButton").classList.contains('all')){

		console.log("contains all, so going back to see more");

		//print just the 3, remove all from the list
		document.getElementById("upcomingButton").classList.remove('all');
		document.getElementById("upcomingButton").innerHTML = "See All";
		$.post('/ajax/ajaxSee3Upcoming.php', {userID},function(contentEchoedFromServer){
			$('#confirmUpcoming').html(contentEchoedFromServer);
			})
	}
	else{
		console.log("does not contain anything, so doing a SEE ALL call");
		//print All of them
		// add all to the list
		document.getElementById("upcomingButton").classList.add('all');
		document.getElementById("upcomingButton").innerHTML = "See Less";
		$.post('/ajax/ajaxSeeAllUpcoming.php', {userID},function(contentEchoedFromServer){
			$('#confirmUpcoming').html(contentEchoedFromServer);
			})
	}

}

function intakeEventsCreatedButton(userID){
	console.log("intaking click");
	if(document.getElementById("eventsCreatedButton").classList.contains('all')){

		console.log("contains all, so going back to see more");

		//print just the 3, remove all from the list
		document.getElementById("eventsCreatedButton").classList.remove('all');
		document.getElementById("eventsCreatedButton").innerHTML = "See All";
		$.post('/ajax/ajaxSee3Created.php', {userID},function(contentEchoedFromServer){
			$('#confirmCreated').html(contentEchoedFromServer);
			})
	}
	else{
		console.log("does not contain anything, so doing a SEE ALL call");
		//print All of them
		// add all to the list
		document.getElementById("eventsCreatedButton").classList.add('all');
		document.getElementById("eventsCreatedButton").innerHTML = "See Less";
		$.post('/ajax/ajaxSeeAllCreated.php', {userID},function(contentEchoedFromServer){
			$('#confirmCreated').html(contentEchoedFromServer);
			})
	}

}

$(document).ready(function(){
    $("#friendButton").click(function(){
		document.getElementById("confirmContentFromServer").style.display = "none";
        $("#confirmContentFromServer").fadeIn();
        // $("#confirmContentFromServer").fadeIn("slow");
        // $("#confirmContentFromServer").fadeIn(30000);
		console.log("fading in the friends");
    });

	$("#upcomingButton").click(function(){
		document.getElementById("confirmUpcoming").style.display = "none";
        $("#confirmUpcoming").fadeIn();
		console.log("fading in upcoming events");
    });

	$("#eventsCreatedButton").click(function(){
		document.getElementById("confirmCreated").style.display = "none";
        $("#confirmCreated").fadeIn();
		console.log("fading in events created");
    });
	
	$("#seeAllSavedButton").click(function(){
		document.getElementById("confirmSaved").style.display = "none";
        $("#confirmSaved").fadeIn();
		console.log("fading in saved events");
    });

});




function intakeGoing(userID, eventID){
	console.log("intaking going");
	if(document.getElementById("goingButton").classList.contains('userGoing')){
		console.log("about to DELETE going");
		deleteGoingJS(userID, eventID);
		// also, if more complex, pop up an alert that says "are you sure you want to do this?"

	}
	else {
		console.log("about to CREATE going");
		createGoingJS(userID, eventID);
		// instead of automatically creating the friendship, would lead to another function that
		// 		sends a notification to the user, asking to be friends. then if presses accepts,
		//		then create the friendship
	}
}

function createGoingJS(userID, eventID){
	document.getElementById("goingButton").classList.add('userGoing');
	document.getElementById("goingButton").innerHTML = "✓Going";
	$.post('/ajax/ajaxCreateGoing.php', {userID, eventID}, function(contentEchoedFromServer){
		$('#confirmGoing').html(contentEchoedFromServer);
		})
}

function deleteGoingJS(userID, eventID){
	document.getElementById("goingButton").classList.remove('userGoing');
	document.getElementById("goingButton").innerHTML = "Going";
	$.post('/ajax/ajaxDeleteGoing.php', {userID, eventID},function(contentEchoedFromServer){
		$('#confirmGoing').html(contentEchoedFromServer);
		})
}







function intakeSave(userID, eventID){
	console.log("intaking save");
	if(document.getElementById("saveButton").classList.contains('saved')){
		console.log("about to DELETE save");
		deleteSaveJS(userID, eventID);
		// also, if more complex, pop up an alert that says "are you sure you want to do this?"

	}
	else {
		console.log("about to CREATE save");
		createSaveJS(userID, eventID);
		// instead of automatically creating the friendship, would lead to another function that
		// 		sends a notification to the user, asking to be friends. then if presses accepts,
		//		then create the friendship
	}
}

function createSaveJS(userID, eventID){
	document.getElementById("saveButton").classList.add('saved');
	document.getElementById("saveButton").innerHTML = "✓Saved (private)";
	$.post('/ajax/ajaxCreateSave.php', {userID, eventID});
}

function deleteSaveJS(userID, eventID){
	document.getElementById("saveButton").classList.remove('saved');
	document.getElementById("saveButton").innerHTML = "Save (private)";
	$.post('/ajax/ajaxDeleteSave.php', {userID, eventID});
}




function intakeSeeAllSavedButton(userID){
	console.log("intaking see all for saved events click");
	if(document.getElementById("seeAllSavedButton").classList.contains('all')){

		console.log("contains all, so going back to see more");

		//print just the 3, remove all from the list
		document.getElementById("seeAllSavedButton").classList.remove('all');
		document.getElementById("seeAllSavedButton").innerHTML = "See All";
		$.post('/ajax/ajaxSee3Saved.php', {userID},function(contentEchoedFromServer){
			$('#confirmSaved').html(contentEchoedFromServer);
			})
	}
	else{
		console.log("does not contain anything, so doing a SEE ALL call");
		//print All of them
		// add all to the list
		document.getElementById("seeAllSavedButton").classList.add('all');
		document.getElementById("seeAllSavedButton").innerHTML = "See Less";
		$.post('/ajax/ajaxSeeAllSaved.php', {userID},function(contentEchoedFromServer){
			$('#confirmSaved').html(contentEchoedFromServer);
			})
	}
}
