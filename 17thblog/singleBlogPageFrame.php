<?php

include('config/config.php');
include('config/init.php');

// echoNicely($_REQUEST);
if(!@$_REQUEST['blogPostID']){
	wrongPage();
}
// if(!isset($_REQUEST['blogPostID'])){
// 	// echo "hi";
// 	wrongPage();
// }

//echo's normal page
$post=getOneBlogPost($_REQUEST['blogPostID']);
echoHeader("Blog Page", $post['title']);
echoBlogPost($_REQUEST['blogPostID']);

//process the form
// $Errors = array();
// if(isset($_REQUEST['commentForm'])){ //
//
// 	areWordsInField('Author');
// 	areWordsInField('Comment');
//
// 	if(sizeof($Errors) == 0){
// 		insertComment(
// 			$_REQUEST['blogPostID'],
// 			$_REQUEST['Author'],  //these have to match the form
// 			$_REQUEST['Comment']
// 		);
// 		header("Location: commentAdded.php?blogPostID=$blogPostID"); // this is how you redirect the browser directly.
// 		exit();
// 	}
// }

//echo's comment form
echo "
<div class='textStyle form'>

	<div style='color:red'>";
	// if(sizeof($Errors) > 0){
	// 	foreach($Errors as $Index=>$Error){
	// 		echo "*$Index is $Error<br>";
	// 	}
	// }
echo "
	</div>
	<p style='font-size:18px'>Submit Comment:</p>
	Author: <input type='text' id='commentAuthor' value='".@$_REQUEST['Author']."'/><br />
	Comment: <textarea cols='22' rows='4' id='content'>".@$_REQUEST['Comment']."</textarea>
	<br>
	<br>
	<input type='button' onclick='saveComment($_REQUEST[blogPostID])' name='commentForm' value='Submit your comment' />
	</form>
</div>
";

//edit this post if you are the admin
if(isset($_SESSION['userID'])) { //if there's a username, and it's not empty
	if($_SESSION['userID']=='1'){
		echo "
		<div class='textStyle form' style='margin-left:40%; margin-right:40%'>
			<a href=editPost.php?blogPostID=$_REQUEST[blogPostID]>Edit this post</a>
		</div>";
	}
}


echoFooter();
?>
