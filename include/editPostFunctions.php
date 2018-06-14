<?php

function submitChangedPost($blogPostID, $title, $date, $author, $body){
	deleteBlogPost($blogPostID);
	insertBlogPost($blogPostID, $title, $date, $author, $body);
}

 ?>
