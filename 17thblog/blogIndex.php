<?php

include('config/config.php');
include('config/init.php');

echoHeader("Blog Home", "Blog Home");

echo "
	<div class='row'>
		<div class='left'>
			<div class='card'>";
				echo "<h2><strong>WELCOME!</strong> Here is a list of all of my blog posts:</h2>";
				$posts=getAllBlogPosts();
				foreach($posts as $post){
					echo "
					<p><a href='singleBlogPageFrame.php?blogPostID=$post[blogPostID]'>$post[title]</a></p>";
				}
			echo "</div>
		</div>
		<div class='right'>
			<div class='card'>
				<h2>Filter By Tags: </h2>";
				$tags=getAllTags();
				foreach($tags as $tag){
					echo "
					<p><a href='blogByTagsFrame.php?tagID=$tag[tagID]'>$tag[name]</a></p>";
				}
			echo "</div>";
			echo "<div class='card'>
				<h2>Filter By Post Author: </h2>";
				$authors=getAllAuthorNames();
				foreach($authors as $author){
					echo "
					<p><a href='blogByAuthor.php?author=$author[author]'>$author[author]</a></p>";
				}
			echo "</div>";

		echo "</div>
	</div>";

echoFooter();
 ?>
