<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Page");

echo "<body class='bg'>";
	echo "<br>";
	echo "<div class='bloghead'>";
		$posts = getAllBlogPosts();
		echo $posts[$_REQUEST['postId']]['title'];
	echo "</div>";

	echo "<div class='textStyle'>";
		echo "Author: ";
		echo $posts[$_REQUEST['postId']]['authorOfPost'];
		echo "<br>";
		echo "Date Post Created: ";
		echo $posts[$_REQUEST['postId']]['dateCreated'];
		echo "<br>";
		echo "<br>";
		echo $posts[$_REQUEST['postId']]['body'];
	echo "</div>";

echo "</body>";

?>
