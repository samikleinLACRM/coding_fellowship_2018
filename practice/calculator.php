<html>
	<head>
		<title>My calculator</title>

		<link rel='stylesheet' href='style.css'/>

	</head>
<body style='text-align:center;'>
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
// bool is_numeric(mixed $var){
// 	if ()
// }
?>

<!-- welcome message!!! -->
<p class='welcomeMessage'> Hello! Here's a cool calculator. Please type in the numbers you want to calculate, and choose an operation: </p>


<!-- math stuff -->
<div class='calc'>
<form action=''  method='post'>
	<input type='text' name='variable1' placeholder='Number 1...'/> <br>
	<select name='math'>
		<option value='Add'> + </option>
		<option value='Subtract'> - </option>
		<option value='Multiply'> x </option>
		<option value='Divide'> ÷ </option>
	</select><br>
	<input type='text' name='variable2' placeholder='Number 2...'/> <br>
	<input type='submit' />
</form>
</div>

<?php

//nested ifs. 1st if = if both variables are input
if(isset($_REQUEST['variable1']) && $_REQUEST['variable2']) {

 //	if(is_numberic($_REQUEST['variable1'])) {

	echo "You input the numbers: ";
	echo $_REQUEST['variable1'];
	echo " & ";
	echo $_REQUEST['variable2'];
	echo "<br> ";
	echo "and the operation: ";
	echo $_REQUEST['math'];
	echo "<br> ";

	if($_REQUEST['math']=='Add') {
		echo "<br> The answer is: " .Add($_REQUEST['variable1'], $_REQUEST['variable2']);
	}
	if($_REQUEST['math']=='Subtract') {
		echo "<br> The answer is: " .Subtract($_REQUEST['variable1'], $_REQUEST['variable2']);
	}
	if($_REQUEST['math']=='Multiply') {
		echo "<br> The answer is: " .Multiply($_REQUEST['variable1'], $_REQUEST['variable2']);
	}
	if($_REQUEST['math']=='Divide') {
		echo "<br> The answer is: " .Divide($_REQUEST['variable1'], $_REQUEST['variable2']);
	}
}


?>

</body>
</html>
