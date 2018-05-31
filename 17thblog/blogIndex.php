<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Home");

// $posts = getAllBlogPosts();
// printNicely($posts);
// die("test");

echo "
<body class='bg'>

	<div class='bloghead'>
		<p>My blog</p>
	</div>

		<div class='row'>
			<div class='left'>
				<div class='card'>";
					echo "<p><strong>WELCOME!</strong> Here is a list of all of my blog posts:</p>";
					$posts=getAllBlogPosts();
					foreach($posts as $post){
						echo "
						<p><a href='singleBlogPageFrame.php?blogPostID=$post[blogPostID]'>Blog $post[title], $post[dateCreated]</a></p>";
					}
				echo "</div>
			</div>
			<div class='right'>
				<div class='card'>
					Filter by tags:";
					$tags=getAllTagNames();
					foreach($tags as $tag){
						echo "
						<p><a href='blogByTagsFrame.php?tag=$tag[tag]'>$tag[tag]</a></p>";;
					}
				echo "</div>
			</div>
		</div>
</body>";

 ?>
