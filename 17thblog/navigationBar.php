
<?php

function echoNavBar($Title) {
	echo "
		<head>
			<title> This is $Title</title>
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



?>


<!-- <html>

	<head>
		<title> This is the navbar</title>
		<link rel='stylesheet' href='style.css'/>

	</head>

	<body>

		<div class='navbarStyle'>
			<a href="main.php">Home |</a>
			<a href="blogIndex.php">Blog |</a>
			<a href="projects.php">Projects</a>
		</div>

</body>

</html> -->
