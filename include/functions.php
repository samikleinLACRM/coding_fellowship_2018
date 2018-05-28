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


$blogPostsArray=array(
	'0'=>array(
		'blogPostID'=>'1',
		'title'=>'Post #1',
		'body'=>'This is my first blog post ever! Welcome! Im going to be putting up more posts soon. yeah. Coding is great.',
		'dateCreated'=>'2018-05-23',
		'authorOfPost'=>'Sami Klein'
	),
	'1'=>array(
		'blogPostID'=>'2',
		'title'=>'Post #2',
		'body'=>'This is my 2nd blog post. Im learning how to use mySQL. Its pretty cool.',
		'dateCreated'=>'2018-05-24',
		'authorOfPost'=>'Sami Klein'
	),
	'2'=>array(
		'blogPostID'=>'3',
		'title'=>'Post #3',
		'body'=>'Another one! - DJ Khaled. Third blog post. Going strong.',
		'dateCreated'=>'2018-05-24',
		'authorOfPost'=>'SK'
	),
	'3'=>array(
		'blogPostID'=>'4',
		'title'=>'Post #4',
		'body'=>'This is my fourth blog post. I hope this works getting into mySQL!',
		'dateCreated'=>'2018-05-24',
		'authorOfPost'=>'SK, reporting for duty'
	),
);


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

// $interm= getAllBlogPosts();

// echo "<pre>";
// var_dump($interm);
// echo "<pre>";



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

//don't use this ever, probably. just use a foreach function
function getNumPosts(){
	$result = dbQuery("
		SELECT COUNT(blogPostID) AS NumRows
		FROM blogPost
	")->fetch();
	return $result;
}


// $interm= getOneBlogPost(2);
//
// echo "<pre>";
// var_dump($interm);
// echo "<pre>";

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

// deleteBlogPost('2');



?>
