<?php

include('config/config.php');
include('config/init.php');


//THIS PAGE IS UNNECESSARY, JUST USED FOR PRACTICE
// THIE COMMENT FORM NEEDS TO BE ON THE SINGLEBLOGPOST PAGE


// function submitComment($author, $comment){
// 	// insertComment($author, $comment);
// 	die("Your comment was just added to post: .
// 	<br><br>
// 	Author: $author <br>
// 	Comment: $comment");
// }

// function submitComment($blogPostID, $author, $comment){
// 	insertComment($blogPostID, $author, $comment);
// 	die("Your comment was just added to post: $blogPostID[title].
// 	<br><br>
// 	Author: $author <br>
// 	Comment: $comment");
// }


$Errors = array();

if(isset($_REQUEST['commentForm'])){ //
	$author = $_REQUEST['Author'];
	$comment = $_REQUEST['Comment'];


	// $blogPostID=($_REQUEST['blogPostID']); //this needs to get the BP from the URL


	if(sizeof($Errors) == 0){
		submitComment(
			$_REQUEST['Author'],  //these have to match the form
			$_REQUEST['Comment']
		);
	}
}




if(sizeof($Errors) > 0){
	echo "THERE WERE ERRORS";
}

function echoFormField($name, $type, $value){
	echo "$name:
	<input type='$type' name='$name' value='".@$_REQUEST[$value]."'/><br />";

}


echo "
Submit Comment:
<form action='' method='post'>";
	echoFormField('Author', 'text', 'Author');
	echoFormField('Comment', 'text', 'Comment');
echo "
	<input type='submit' name='commentForm' value='Submit your comment' />
</form>
";


?>
