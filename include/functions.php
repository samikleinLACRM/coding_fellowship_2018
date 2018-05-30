<?php

function echoNavAndHead($Title) {
	echo "
		<head>
			<title>$Title</title>
			<link rel='stylesheet' href='style.css'/>

		</head>

		<body>
			<div class='navbarStyle'>
				<a href='main.php'>Home |</a>
				<a href='blogIndex.php'>Blog |</a>
				<a href='projects.php'>Projects</a>
			</div>
	</body>
";
}


function printNicely($interm) {
	echo "<pre>";
	var_dump($interm);
	echo "<pre>";
}


//Blog functions!!

function getAllBlogPosts() {
	$result = dbQuery("
		SELECT *
		FROM blogPost
	")->fetchAll();

	return $result;
}

function getOneBlogPost($newBlogPostID) {
	$result = dbQuery("
		SELECT *
		FROM blogPost
		WHERE blogPostID = :blogPostID
	", array(
		'blogPostID'=>$newBlogPostID
		))->fetch();

	return $result;
}

// $practice=getOneBlogPost(2);
// printNicely($practice);

//don't use this ever, probably. just use a foreach function
function getNumPosts(){
	$result = dbQuery("
		SELECT COUNT(blogPostID) AS NumRows
		FROM blogPost
	")->fetch();
	return $result;
}

//primary key will auto increment itself, don't need to add
function insertBlogPost($title, $body, $dateCreated, $authorOfPost) {
	$result = dbQuery("
		INSERT INTO blogPost(title, body, dateCreated, authorOfPost)
		VALUES('$title', '$body', '$dateCreated', '$authorOfPost')
	")->fetch();
}

// insertBlogPost('Post #4', 'This is my fourth blog post. I hope this works getting into mySQL!', '2018-05-24', 'SK, reporting for duty');

//deletes blog post by ID number, not any other factor
function deleteBlogPost($newBlogPostID) {
	$result = dbQuery("
		DELETE FROM blogPost
		WHERE blogPostID = :blogPostID
		", array(
			'blogPostID'=>$newBlogPostID
		))->fetch();
}

function getPostComments($thisBlogPostID){
	$result = dbQuery("
		SELECT *
		FROM comments
		WHERE blogPostID = :blogPostID
		", array(
		'blogPostID'=>$thisBlogPostID
		))->fetch();
	return $result;
}


// $practice=getPostComments(2);
// printNicely($practice);


?>
