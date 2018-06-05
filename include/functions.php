<?php

function echoHeader($Title, $PageName) {
	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>

		</head>

		<body class='bg'>
			<div class='navbarStyle'>
				<a href='main.php'>Home |</a>
				<a href='blogIndex.php'>Blog |</a>
				<a href='projects.php'>Projects</a>
			</div>";
			if ($PageName!=null) {
				echo "
				<br>
				<div class='bloghead'>
					$PageName
				</div>
				";
			}
}

function wrongPage(){
	header("Location: blogIndex.php"); /* Redirect browser */
	exit();

	//not sure which is better
	// echoHeader("Wrong Page!", "Wrong Page!");
	// sleep(2);
	// echo "<p class='textStyle' style='text-align:center'>Oops! Use the Navigation Bar to go to another page. <p>";
	// echoFooter();
	// die("");
}

function echoFooter(){
	echo "
	<div class='right' style='color:black'>
		(FOOTER. make this look nice later)
		<br>
		Contact:
		<br>
		email: sami.klein@wustl.edu
	</div>
	</body>
	";
}


function echoNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}

function echoBlogPost($blogPostID){

	$post=getOneBlogPost($blogPostID);

	echo "<div class='textStyle'>
		<strong>Author: </strong>
		$post[authorOfPost]
		<br>
		<strong>Date Post Created: </strong>
		$post[dateCreated]
	";

	$tags=getThisPostsTags($blogPostID);

	if($tags!= null){
		echo "<br>
		<strong>Tags: </strong><mark style='background-color:#D3D3D3'>";

		foreach($tags as $tag){
			echo $tag['name']; //this isn't correct. fix it after fix all calls
			echo "     ";
		}
		echo "</mark>";
	}
	echo "
		<br><br>
		$post[body]
	";

	$comments=getPostComments($post['blogPostID']);
	if($comments!=null) {
		echo "<br><br>
			<h2 style='font-size:20px'>Comments: </h2>";
			foreach($comments as $comment){
				echo "
					<p><strong>Comment posted: </strong>$comment[datePosted]</p>
					<p><strong>Author: </strong>$comment[authorName]</p>
					<p><strong>Comment: </strong>$comment[comment]</p>
					<br>
					";
				}
		echo "<br><br>Add your own comments: Coming soon!";
 	}
	echo "</div>";
}


?>
