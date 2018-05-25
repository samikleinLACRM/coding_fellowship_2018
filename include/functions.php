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

?>
