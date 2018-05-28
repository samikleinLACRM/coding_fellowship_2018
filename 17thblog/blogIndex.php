<?php

include('config/config.php');
include('config/init.php');

echoNavAndHead("Blog Home");


// should be linking to some sort of variable,

//lines 20/21 should def be changed

$iHopeThisWorks = getNumPosts();
// echo $iHopeThisWorks["NumRows"];
// echo "blah";
// printNicely($iHopeThisWorks);
// die("test");


// sizeof() //pass in an array

$posts = getAllBlogPosts();
foreach($posts as $post){
	echo "<h2>$post[title]</h2>";
}
die("test");

echo "
<body class='bg'>

	<h1>My blog</h1>

	<div class='textStyle'>
		<p>WELCOME TO MY BLOG! IT'S GREAT! READ ABOUT MY LIFE</p>";

for ($i=0; $i<$iHopeThisWorks; $i++){
	echo "
	<p><a href='blogPageFrame.php?postId=$i'>Blog Post #$i, 05/23/18</p>
	<br>";
}
echo "
	</div>
</body>
";


 ?>
