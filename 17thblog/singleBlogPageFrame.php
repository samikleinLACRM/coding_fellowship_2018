<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

//echo's normal page
$post=getOneBlogPost($_REQUEST['blogPostID']);
echoHeader("Blog Page", $post['title']);
echoBlogPost($_REQUEST['blogPostID']);


//echo's comment form

$Errors = array();

function validateFormField($formField){
	global $Errors;

	if(!$_REQUEST[$formField]){
		$Errors[$formField] = 'required';
	}
	// return $Errors;
}

if(isset($_REQUEST['commentForm'])){ //

	validateFormField('Author');
	validateFormField('Comment');

	if(sizeof($Errors) == 0){
		submitComment(
			$_REQUEST['blogPostID'],
			$_REQUEST['Author'],  //these have to match the form
			$_REQUEST['Comment']
		);
	}
}



echo "
<div class='textStyle commentForm'>

	<div style='color:red'>";
	if(sizeof($Errors) > 0){
		foreach($Errors as $Index=>$Error){
			echo "*$Index is $Error<br>";
		}
	}
echo "
	</div>
	<p style='font-size:18px'>Submit Comment:</p>
	<form action='' method='post'>

	Author: <input type='text' name='Author' value='".@$_REQUEST['Author']."'/><br />
	Comment:   <textarea cols='22' rows='4' name='Comment'>".@$_REQUEST['Comment']."</textarea>";

echo "
		<br>
		<br>
		<input type='submit' name='commentForm' value='Submit your comment' />
	</form>
</div>
";


echoFooter();
?>
