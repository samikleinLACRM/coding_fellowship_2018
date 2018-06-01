<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Home");

echo "
<body class='bg'>

	<div class='bloghead'>
		<p>My blog</p>
	</div>

		<div class='row'>
			<div class='left'>
				<div class='card'>";
					echo "<h2><strong>WELCOME!</strong> Here is a list of all of my blog posts:</h2>";
					$posts=getAllBlogPosts();
					foreach($posts as $post){
						echo "
						<p><a href='singleBlogPageFrame.php?blogPostID=$post[blogPostID]'>Blog $post[title], $post[dateCreated]</a></p>";
					}
				echo "</div>
			</div>
			<div class='right'>
				<div class='card'>
					<h2>Filter by tags: </h2>";
					$tags=getAllTagNames();
					foreach($tags as $tag){
						echo "
						<p><a href='blogByTagsFrame.php?tag=$tag[tag]'>$tag[tag]</a></p>";;
					}
				echo "</div>";
				echo "<div class='card'>
					<h2>Filter by post Author: </h2>";
					$authors=getAllAuthorNames();
					foreach($authors as $author){
						echo "
						<p><a href='blogByAuthor.php?authorOfPost=$author[authorOfPost]'>$author[authorOfPost]</a></p>";
					}
				echo "</div>";

			echo "</div>
		</div>
</body>";

 ?>
