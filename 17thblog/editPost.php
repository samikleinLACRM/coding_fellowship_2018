<?php

include('config/config.php');
include('config/init.php');

if(!isset($_SESSION['userID'])){ //if username is not set
	wrongPage();
	if($_SESSION['userID']!=='1'){
		wrongPage();
	}
}

if(!isset($_REQUEST['blogPostID'])) {
	echoHeader("Wrong Page!", "Wrong Page!");
	echo "<p class='textStyle' style='text-align:center'>Oops! No specific blog post selected to edit. Please choose a specific blog post.<p>";
	echoFooter();
	die("");
}


//edit title, author, date, tags, and actual words of $post

//be able to delete comments. should I make it so can edit them too?

$postEditing = getOneBlogPost($_REQUEST['blogPostID']);

echoHeader("Blog Page", null);


if(isset($_REQUEST['editPostForm'])){ //
	submitChangedPost(
		$_REQUEST['blogPostID'],
		$_REQUEST['title'],  //these have to match the form
		$_REQUEST['date'],
		$_REQUEST['author'],
		$_REQUEST['body']
		);
		header("Location: postEdited.php?blogPostID=$_REQUEST[blogPostID]");
		exit();
}

//prob need to change the date later
echo "
<div class='textStyle form' style='color:white; background-color:#0a009b'>
	<form action='' method='post'>
		blogPostID: <input type='number' name='blogPostID' value='".$postEditing['blogPostID']."'>
		<br>
		<p style='color:red'>*I would not recommend changing the blogPostID</p>

		title: <textarea cols='22' rows='4' name='title'>".$postEditing['title']."</textarea>
		<br><br>
		date: <input type='text' name='date' value='".$postEditing['date']."'>
		<br><br>
		author: <input type='text' name='author' value='".$postEditing['author']."'>
		<br><br>
		body: <textarea cols='40' rows='8' name='body'>".$postEditing['body']."</textarea>
		<br><br>
		<input type='submit' name='editPostForm' value='Submit your changes' />
	</form>
</div>
";


echoFooter();
?>
