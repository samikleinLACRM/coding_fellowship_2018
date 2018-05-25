<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Sami's Page");

echo "<body class='bg'>";

echo "<br>";

echo "<div style='text-align: center; background-color: white; font-size: 25px; border-radius: 25px; padding:10px; font-weight: 600; margin-left:300px; margin-right:300px;'>";
echo $blogPostsArray[$_REQUEST['postId']]['title'];
echo "</div>";

echo "<div class='textStyle'>";
echo "Author: ";
echo $blogPostsArray[$_REQUEST['postId']]['authorOfPost'];
echo "<br>";
echo "Date Post Created: ";
echo $blogPostsArray[$_REQUEST['postId']]['dateCreated'];
echo "<br>";
echo "<br>";

echo $blogPostsArray[$_REQUEST['postId']]['body'];
echo "</div>";
echo "</body>";


// echo "
// <body class='bg'>
// 	<h1>$blogPostsArray[$_REQUEST['postId']]['title']</h1>
// 	<div class='textStyle'>
// 		<p>$blogPostsArray[$_REQUEST['postId']]['authorOfPost']</p>
// 		<p>$blogPostsArray[$_REQUEST['postId']]['dateCreated']</p>
// 		<p>$blogPostsArray[$_REQUEST['postId']]['body']</p>
// 	</div>
// </body>
// ";

?>






<!--
<html>
	<head>
		<title>This is post #1</title>
		<link rel='stylesheet' href='style.css'/>
	</head>
	<body class='bg'>
		<?php // include 'navigationBar.php'; ?>
		<h1>Post #1</h1>
		<div class='textStyle'>
			<p>So today, October 18th, 3013, I drove my hovercar to work but I was speeding so the police robot gave me a ticket. </p>
		</div>
	</body>
</html>
-->
