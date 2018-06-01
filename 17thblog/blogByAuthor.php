<?php

include('config/config.php');
include('config/init.php');

$wantToWrite="Author: $_REQUEST[authorOfPost]";

echoNavAndHead($wantToWrite);
printPageName($wantToWrite);

// foreach post within this author, print it

	$posts=getPostsWithThisAuthor($_REQUEST['authorOfPost']);

	foreach($posts as $post){
		$var = $post['blogPostID'];
		$toPrint = printBlogPost($var);
		echo $toPrint;
	}

?>
