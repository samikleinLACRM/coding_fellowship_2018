<?php

include('config/config.php');
include('config/init.php');

if(!@$_SESSION['userID']=='1'){
	wrongPage();
}


echoHeader("Post Edited", "Post Edited");

$post=getOneBlogPost($_REQUEST['blogPostID']);

echo"
<div class='textStyle form'>
	Blog Post sucessfully edited! Click here to see the post:
	<br><br>
	<a href='singleBlogPageFrame.php?blogPostID=$_REQUEST[blogPostID]'>$post[title]</a>
</div>";


 ?>
