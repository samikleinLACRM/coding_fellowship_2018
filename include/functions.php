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

//deletes blog post by ID number, not any other factor
function deleteBlogPost($newBlogPostID) {
	$result = dbQuery("
		DELETE FROM blogPost
		WHERE blogPostID = :blogPostID
		", array(
			'blogPostID'=>$newBlogPostID
		))->fetch();
}



//comment functions
function getPostComments($thisBlogPostID){
	$result = dbQuery("
		SELECT *
		FROM comments
		WHERE blogPostID = :blogPostID
		ORDER BY datePosted DESC
		", array(
			'blogPostID'=>$thisBlogPostID
	))->fetchAll();
	return $result;
}


function getAllTags(){
	$result = dbQuery("
		SELECT *
		FROM tags
		"
	)->fetchAll();
	return $result;
}

function getAllTagNames(){
	$result = dbQuery("
		SELECT DISTINCT tag
		FROM tags
		"
	)->fetchAll();
	return $result;
}

function getTagsWithThisName($oneTagName){
	$result = dbQuery("
		SELECT *
		FROM tags
		WHERE tag = :tag
	", array(
		'tag'=>$oneTagName
	))->fetchAll();

	return $result;
}

function getTagNamesWithThisNumber($oneTagNumber){
	$result = dbQuery("
		SELECT tag
		FROM tags
		WHERE blogPostID = :blogPostID
	", array(
		'blogPostID'=>$oneTagNumber
	))->fetchAll();
	return $result;
}


function getPostsWithThisAuthor($Author){
	$result = dbQuery("
		SELECT blogPostID
		FROM blogPost
		WHERE authorOfPost = :authorOfPost
	", array(
		'authorOfPost'=>$Author
	))->fetchAll();
	return $result;
}

function getAllAuthorNames(){
	$result = dbQuery("
		SELECT DISTINCT authorOfPost
		FROM blogPost
		"
	)->fetchAll();
	return $result;

}



function printBlogPost($var){

echo "<body class='bg'>";
	$post=getOneBlogPost($var);

	echo "<div class='textStyle'>";
		echo "<strong>Author: </strong>";
		echo $post['authorOfPost'];
		echo "<br>";
		echo "<strong>Date Post Created: </strong>";
		echo $post['dateCreated'];

		$tagNames=getTagNamesWithThisNumber($post['blogPostID']);

		if ($tagNames!= null){
			echo "<br>";
			echo "<strong>Tags: </strong><mark style='background-color:#D3D3D3'>";

			foreach($tagNames as $tagName){
				echo $tagName['tag'];
				echo "     ";
			}
			echo "</mark>";
		}
		echo "<br>";
		echo "<br>";
		echo $post['body'];

	if(getPostComments($post['blogPostID'])!= null) {
		$comments = getPostComments($post['blogPostID']);
		echo "<br>";
		echo "<br>";
			echo "<h2 style='font-size:20px'>Comments: </h2>";
			foreach($comments as $comment){
				echo "
					<p><strong>Comment posted: </strong>$comment[datePosted]</p>
					<p><strong>Author: </strong>$comment[authorName]</p>
					<p><strong>Comment: </strong>$comment[comment]</p>
					<br>
					";
				}
			echo "<br>";
			echo "<br>";
			echo "Add your own comments: Coming soon!";
 	}
echo "</div>";
echo "</body>";
}


function printPageName($wantToWrite){
	echo "<body class='bg'>";
		echo "<br>";
		echo "<div class='bloghead'>";
			echo $wantToWrite;
		echo "</div>";
	echo "</body>";
}

?>
