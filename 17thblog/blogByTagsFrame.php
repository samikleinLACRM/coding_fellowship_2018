<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Tag: $_REQUEST[tag]");

// foreach post within this tag, print it

	$tags=getTagsWithThisName($_REQUEST['tag']);

	foreach($tags as $tag){
		$var = $tag['blogPostID'];
		$toPrint = printBlogPost($var);
		echo $toPrint;
	}
	
?>
