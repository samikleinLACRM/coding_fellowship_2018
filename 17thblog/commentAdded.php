<?php

include('config/config.php');
include('config/init.php');

//make this a more involved page when get time!

if($_REQUEST==null){
	wrongPage();
}

echoHeader("Comment Added", "Your comment was added!");

$blogPostID=$_REQUEST['blogPostID'];
$post = getOneBlogPost($blogPostID);

echo "
	<div class='textStyle' style='text-align: center'>
		Thank you for helping to contribute to this blog!Your comment was added to the blog post entitled:
		<br>
		<strong>$post[title]</strong>.
		<br>
		<br>
		Go to this link to view your new comment:
		<br>
		<a href='singleBlogPageFrame.php?blogPostID=$post[blogPostID]'>$post[title], $post[date]</a></p>
	</div>
";

?>
