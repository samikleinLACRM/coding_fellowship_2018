<?php

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
// function insertBlogPost($title, $body, $dateCreated, $authorOfPost) {
// 	$result = dbQuery("
// 		INSERT INTO blogPost(title, body, dateCreated, authorOfPost)
// 		VALUES('$title', '$body', '$dateCreated', '$authorOfPost')
// 	")->fetch();
// }

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


// function getAllTags(){
// 	$result = dbQuery("
// 		SELECT *
// 		FROM tag
// 		"
// 	)->fetchAll();
// 	return $result;
// }

function getAllTags(){
	$result = dbQuery("
		SELECT *
		FROM tag
	")->fetchAll();
	return $result;
}

function getNameForThisID($tagID){
	$result = dbQuery("
		SELECT name
		FROM tag
		WHERE tagID = :tagID
	", array(
		'tagID'=>$tagID
	))->fetch();
	return $result;
}

function getAllPostsWithThisTagID($oneTagID){
	$result = dbQuery("
		SELECT blogPostID
		FROM post2tag
		WHERE tagID = :tagID
	", array(
		'tagID'=>$oneTagID
	))->fetchAll();
	return $result;
}

function getThisPostsTags($blogPostID){
	$result = dbQuery("
		SELECT *
		FROM tag
		INNER JOIN post2tag ON post2tag.tagID = tag.tagID
		WHERE post2tag.blogPostID = $blogPostID
	")->fetchAll();
	return $result;
}

// function getThisPostsTags($blogPostID){
// 	$result = dbQuery("
// 		SELECT *
// 		FROM tag
// 		INNER JOIN post2tag ON post2tag.tagID = tag.tagID
// 		WHERE post2tag.blogPostID = :post2tag.blogPostID
// 	", array(
// 		'post2tag.blogPostID'=>$blogPostID
// 	))->fetchAll();
// 	return $result;
// }


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

 ?>
