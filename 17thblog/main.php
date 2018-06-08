<?php
include('config/config.php');
include('config/init.php');

echo "
	<div class='container'>
		<img class='centerImage' src='pics/galaxypic.jpg' alt='Galaxy' height=500>
		<div class='centeredPictureText'>Welcome to Sami Klein's website!</div>
	</div>
	<p><br></p>
";

echoHeader("Sami's Page", null);

echo "
	<div class='row'>
	  <div class='left'>
	  	<div class='card'>
	    	<h2>About me</h2>
	    	<p>I'm Sami and I'm doing a coding fellowship with LACRM this summer. Woo!</p>
			<p>Next: put a picture of me in here! </p>
			<p> words </p>
			<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
			reprehenderit in voluptate velit esse cillum dolore eu fugiat
			nulla pariatur. Excepteur sint occaecat cupidatat non proident,
			sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
			in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
			mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
			et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
			sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
			exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
			occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
			incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
			laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
			laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
			sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
		</div>
	  </div>
	  <div class='right'>
	  	<div class='card'>
	    	<h2>Recent Posts:</h2>";
			$posts=getRecentPosts();
			foreach($posts as $post){
				echo "
				<p><a href='singleBlogPageFrame.php?blogPostID=$post[blogPostID]'>$post[title]</a></p>";
			}
echo "
		</div>
	  </div>
	</div>
";

echoFooter();
?>
