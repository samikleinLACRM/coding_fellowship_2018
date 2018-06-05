<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$posts=getAllPostsWithThisTagID($_REQUEST['tagID']);

// $tagName=getNameForThisID($_REQUEST['tagID']);
// $wantToWrite="Tag: $posts[0]['name']";
// echoNicely($posts);
echoHeader("blah","blah");


// foreach post within this tag, echo it
foreach($posts as $post){
	echo echoBlogPost($post['blogPostID']);
}

echoFooter();
?>
