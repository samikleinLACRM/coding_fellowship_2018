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

	echo "<div class='textStyle'>";
		echo "Author: ";
		echo $post['authorOfPost'];
		echo "<br>";
		echo "Date Post Created: ";
		echo $post['dateCreated'];
		if ($post['tags'] != null){
			echo "<br>";
			echo "Tags: <mark style='background-color:#D3D3D3'>";
			echo $post['tags'];
			echo "</mark>";
		}
		echo "<br>";
		echo "<br>";
		echo $post['body'];
	echo "</div>";

echo "</body>";

?>
