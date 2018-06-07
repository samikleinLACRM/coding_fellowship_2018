<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$posts=getAllPostsWithThisTagID($_REQUEST['tagID']);



$tag=getTag($_REQUEST['tagID']);
// echoNicely($tag);
// die("test");
$wantToWrite="Tag: $tag[name]";

echoHeader($wantToWrite,$wantToWrite);


// foreach post within this tag, echo it
foreach($posts as $post){
	echo echoBlogPost($post['blogPostID']);
}

echoFooter();
?>
