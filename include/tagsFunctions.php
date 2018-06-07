<?php

//functions to do with tags

function getAllTags(){
	$result = dbQuery("
		SELECT *
		FROM tag
	")->fetchAll();
	return $result;
}

function getTag($tagID){
	$result = dbQuery("
		SELECT *
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



?>
