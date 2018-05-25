<?php

include('config/config.php');
include('include/db_query.php');

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
