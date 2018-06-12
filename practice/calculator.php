<html>
	<head>
		<title>My calculator</title>

		<link rel='stylesheet' href='style.css'/>

	</head>
<body>
<h1>**Sami's Awesome Calculator**</h1>

<?php

//functions
function Add($variable1, $variable2) {
	return $variable1 + $variable2;
}
function Subtract($variable1, $variable2) {
	return $variable1 - $variable2;
}
function Multiply($variable1, $variable2) {
	return $variable1 * $variable2;
}
function Divide($variable1, $variable2) {
	return $variable1 / $variable2;
}
?>

<!-- welcome message!!! -->
<p class='welcomeMessage'> Hello! Here's a cool calculator. Please type in the numbers you want to calculate, and choose an operation: </p>


<!-- math stuff -->
<div>
<form action = ''  method='post'>
	<input type='text' name='variable1' /> <br>
	<select name = 'math'>
		<option value='Add'> + </option>
		<option value='Subtract'> - </option>
		<option value='Multiply'> x </option>
		<option value='Divide'> ÷ </option>
	</select><br>
	<input type='text' name='variable2' /> <br>
	<input type='submit' />
</form>
</
<?php

// Add function
if(isset($_REQUEST['variable1']) && $_REQUEST['variable2'] && $_REQUEST['math']) {
	echo "You input the numbers: ";
	//echo $_REQUEST['variable1'];
	echo " & ";
	//echo $_REQUEST['variable2'];
	if ('math' == 'Add' ) {
		echo "<br> The answer is: " .Add($_REQUEST['variable1'], $_REQUEST['variable2']);
	}


}

?>
</body>
</html>
