<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$posts=getAllPostsWithThisTagID($_REQUEST['tagID']);

// echoNicely($posts);

$tag=getTag($_REQUEST['tagID']);
// echoNicely($tag);
// die("test");
$wantToWrite="Tag: $tag[name]";

echoHeader($wantToWrite,$wantToWrite);


echo "<div class='textStyle'>";
// foreach post within this tag, echo it
foreach($posts as $post){
	$thisEntirePost=getOneBlogPost($post['blogPostID']);
	echo "<p> <a href='singleBlogPageFrame.php?blogPostID=$thisEntirePost[blogPostID]'>$thisEntirePost[title]</a></p>";
}
echo "</div>";

echoFooter();
?>
