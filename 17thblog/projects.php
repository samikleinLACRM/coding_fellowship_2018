<?php
include('config/config.php');
include('config/init.php');

echoNavAndHead("Projects");

echo "
	<body class='bg'>
		<div class='bloghead'>
			<p>Summer Projects</p>
		</div>
		<div class='textStyle'>
			<p>Here is a list of some projects that I've worked on this summer!</p>
			<ul>
				<li> <a href='/practice/calculator.php'>4 function Calculator</li>
				<li> <a href='/practice/colorCalc.php'>Color Calculator</li>
			</ul>
		</div>
	</body>
	";

?>
