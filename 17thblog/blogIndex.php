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

	<div class='textStyle'>
		<p>WELCOME TO MY BLOG! IT'S GREAT! READ ABOUT MY LIFE</p>";

		$posts=getAllBlogPosts();
			foreach($posts as $post){
				echo "
				<p><a href='blogPageFrame.php?blogPostID=$post[blogPostID]'>Blog $post[title], $post[dateCreated]</p>";
			}

echo "
	</div>
</body>
";


 ?>
