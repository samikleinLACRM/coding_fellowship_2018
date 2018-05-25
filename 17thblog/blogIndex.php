<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Home");





// echo "$blogPostsArray['0'][0]";
// die("test2");

// echo "<pre>";
// var_dump($blogPostsArray);
// echo "<pre>";


// should be linking to some sort of variable,

//lines 20/21 should def be changed
echo "

<body class='bg'>

	<h1>My blog</h1>

	<div class='textStyle'>
		<p>WELCOME TO MY BLOG! IT'S GREAT! READ ABOUT MY LIFE</p>
		<p><a href='blogPageFrame.php?postId=0'>Blog Post #1, 05/23/18</p>
		<p><a href='blogPageFrame.php?postId=1'>Blog Post #2, 05/24/18</p>
		<p><a href='blogPageFrame.php?postId=2'>Blog Post #3, 05/24/18</p>
		<p><a href='blogPageFrame.php?postId=3'>Blog Post #4, 05/24/18</p>
	</div>
</body>
";


 ?>
