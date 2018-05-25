<html>
	<head>
		<title>Color Calc</title>
		<link rel='stylesheet' href='colorStyle.css'/>
	</head>
<body class='someStyle'>
<h1>Color Calculator</h1>

<!-- welcome message!!! -->
<p>Hello! Here's a color calculator. Please pick two colors, then the background of this page will become a combination of the colors that you choose :)</p>


<form action=''  method='post'>
	<select name='color1'>
		<option value='Red'>Red</option>
		<option value='Yellow'>Yellow</option>
		<option value='Blue'>Blue</option>
	</select><br>
	<select name='color2'>
		<option value='Red'>Red</option>
		<option value='Yellow'>Yellow</option>
		<option value='Blue'>Blue</option>
	</select><br>
	<input type='submit'/>
</form>
</div>



<?php

//not working so well...


//red
if(($_REQUEST['color1']=='Red' && $_REQUEST['color2']=='Red') || ($_REQUEST['color2']=='Red' && $_REQUEST['color1']=='Red')) {
	echo "Red + Red = Red!";
	echo "<body style='background-color:#ff4744'>";
}

//orange
if(($_REQUEST['color1']=='Red' && $_REQUEST['color2']=='Yellow') || ($_REQUEST['color2']=='Red' && $_REQUEST['color1']=='Yellow')) {
	echo "Red + Yellow = Orange!";
	echo "<body style='background-color:Orange'>";
}

//Yellow
if(($_REQUEST['color1']=='Yellow' && $_REQUEST['color2']=='Yellow') || ($_REQUEST['color2']=='Yellow' && $_REQUEST['color1']=='Yellow')) {
	echo "Yellow + Yellow = Yellow!";
	echo "<body style='background-color:#fbff8e'>";
}

//green
if(($_REQUEST['color1']=='Blue' && $_REQUEST['color2']=='Yellow') || ($_REQUEST['color2']=='Blue' && $_REQUEST['color1']=='Yellow')) {
	echo "Yellow + Blue = Green!";
	echo "<body style='background-color:#3faf75'>";
}

//Blue
if(($_REQUEST['color1']=='Blue' && $_REQUEST['color2']=='Blue') || ($_REQUEST['color2']=='Blue' && $_REQUEST['color1']=='Blue')) {
	echo "Blue + Blue = Blue!";
	echo "<body style='background-color:#446aff'>";
}

//purple
if(($_REQUEST['color1']=='Red' && $_REQUEST['color2']=='Blue') || ($_REQUEST['color2']=='Red' && $_REQUEST['color1']=='Blue')) {
	echo "Blue + Red = Purple!";
	echo "<body style='background-color:#ac5ec4'>";
}


?>

</body>
</html>
