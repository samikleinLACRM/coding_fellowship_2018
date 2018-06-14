<?php

//Blog functions!!


function echoBlogPost($blogPostID){

	$post=getOneBlogPost($blogPostID);

	//these are to fix the date so it doesn't display the time too!

	echo "<div class='textStyle'>
			<strong>Title: </strong>
			$post[title]
			<br>
			<strong>Author: </strong>
			$post[author]
			<br>
			<strong>Date: </strong>
			".echoJustDate($post['date'])."
	";

	$tags=getThisPostsTags($blogPostID);

	if($tags!= null){
		echo "<br>
		<strong>Tags: </strong>";

		foreach($tags as $tag){
			echo "<mark style='background-color:$tag[color]'>".$tag['name']."</mark>     ";
		}
	}
	echo "
		<br><br>
		$post[body]
	";



	$comments=getPostComments($post['blogPostID']);
	if($comments!=null) {
		echo "
		</div> <div class='textStyle'>
			<h2 style='font-size:20px'>Comments: </h2>";
			foreach($comments as $comment){
				$date = echoJustDate($comment['date']);
				echoComment($date, $comment['author'], $comment['comment']);
			}
 	}
	echo "</div>";
}


function echoComment($date, $author, $comment){
	echo "
		<strong>Comment posted: </strong>$date
		<br>
		<strong>Author: </strong>$author
		<br>
		$comment
		<br><br><br>
		";
	// if($comment.next!=null){
	// 	echo "<br><br>";
	// }
}




function getAllBlogPosts() {
	$result = dbQuery("
		SELECT *
		FROM blogPost
		ORDER BY date
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
function insertBlogPost($blogPostID, $title, $date, $author, $body) {
	$result = dbQuery("
		INSERT INTO blogPost(blogPostID, title, date, author, body)
		VALUES(:blogPostID, :title, :date, :author, :body)
	", array(
		'blogPostID'=>$blogPostID,
		'title'=>$title,
		'date'=>$date,
		'author'=>$author,
		'body'=>$body
	))->fetchAll(); //All
}


function insertComment($blogPostID, $author, $comment){
	$result = dbQuery("
		INSERT INTO comments (blogPostID, author, comment)
		VALUES(:blogPostID, :author, :comment)
	", array(
		'blogPostID'=>$blogPostID,
		'author'=>$author,
		'comment'=>$comment
	))->fetchAll(); //All
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
		ORDER BY date DESC
		", array(
			'blogPostID'=>$thisBlogPostID
	))->fetchAll();
	return $result;
}





function getPostsWithThisAuthor($Author){
	$result = dbQuery("
		SELECT blogPostID
		FROM blogPost
		WHERE author = :author
	", array(
		'author'=>$Author
	))->fetchAll();
	return $result;
}

function getAllAuthorNames(){
	$result = dbQuery("
		SELECT DISTINCT author
		FROM blogPost
		"
	)->fetchAll();
	return $result;

}

function getRecentPosts(){
	$result = dbQuery("
		SELECT *
		FROM blogPost
		ORDER BY date DESC
		LIMIT 5
	")->fetchAll();
	return $result;
}




 ?>
