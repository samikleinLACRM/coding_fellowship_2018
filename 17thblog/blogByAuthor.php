<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$wantToWrite="Author: $_REQUEST[author]";
echoHeader($wantToWrite,$wantToWrite);

$posts=getPostsWithThisAuthor($_REQUEST['author']);

// foreach post within this author, echo it
foreach($posts as $post){
	echo echoBlogPost($post['blogPostID']);
}

echoFooter();
?>
