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
		echo "<strong>Author: </strong>";
		echo $post['authorOfPost'];
		echo "<br>";
		echo "<strong>Date Post Created: </strong>";
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


	if(getPostComments($post['blogPostID'])!= null) {
		$comments = getPostComments($post['blogPostID']);
		echo "<div class='textStyle'>";
			echo "<h2>Comments: </h2>";
			foreach($comments as $comment){
				echo "
					<p><strong>Comment posted: </strong>$comment[datePosted]</p>
					<p><strong>Author: </strong>$comment[authorName]</p>
					<p><strong>Comment: </strong>$comment[comment]</p>
					<br>
					";
				}
			echo "<br>";
			echo "<br>";
			echo "Add your own comments: Coming soon!";
		echo "</div>";
 	}

echo "</body>";

?>
