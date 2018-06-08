<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$wantToWrite="Author: $_REQUEST[author]";
echoHeader($wantToWrite,$wantToWrite);

$posts=getPostsWithThisAuthor($_REQUEST['author']);

echo "<div class='textStyle'>";

// foreach post within this author, echo it
foreach($posts as $post){
	$thisEntirePost=getOneBlogPost($post['blogPostID']);
	echo "<p> <a href='singleBlogPageFrame.php?blogPostID=$thisEntirePost[blogPostID]'>$thisEntirePost[title]</a></p>";
}

echo "</div>";


echoFooter();
?>
