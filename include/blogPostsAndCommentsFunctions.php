<?php

//Blog functions!!


function echoBlogPost($blogPostID){

	$post=getOneBlogPost($blogPostID);

	//these are to fix the date so it doesn't display the time too!
	$timestamp = strtotime($post['date']);
	$date = date('d-m-Y', $timestamp);

	echo "<div class='textStyle'>
		<strong>Author: </strong>
		$post[author]
		<br>
		<strong>Date: </strong>
		$date
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
		echo "<br><br>
			<h2 style='font-size:20px'>Comments: </h2>";
			foreach($comments as $comment){

				$timestamp2 = strtotime($comment['date']);
				$date2 = date('d-m-Y', $timestamp2);

				echo "
					<p><strong>Comment posted: </strong>$date2</p>
					<p><strong>Author: </strong>$comment[author]</p>
					<p><strong>Comment: </strong>$comment[comment]</p>
					<br>
					";
				}
		echo "<br><br>Add your own comments: Coming soon!";
 	}
	echo "</div>";
}






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
function insertBlogPost($title, $author, $body) {
	$result = dbQuery("
		INSERT INTO blogPost(title, author, body)
		VALUES(:title, :author, :body)
	", array(
		'title'=>$title,
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

 ?>
