<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Page");

echo "<body class='bg'>";
	echo "<br>";
	echo "<div class='bloghead'>";
		$post=getOneBlogPost($_REQUEST['blogPostID']);
		echo $post['title'];
	echo "</div>";
echo "</body>";

printBlogPost($_REQUEST['blogPostID']);

?>
