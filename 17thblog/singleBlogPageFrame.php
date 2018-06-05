<?php

include('config/config.php');
include('config/init.php');

if($_REQUEST==null){
	wrongPage();
}

$post=getOneBlogPost($_REQUEST['blogPostID']);
echoHeader("Blog Page", $post['title']);

echoBlogPost($_REQUEST['blogPostID']);

echoFooter();
?>
