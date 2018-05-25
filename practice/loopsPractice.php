<html>
<head>
</head>

<body>

<?php


//without an array
$blah = 0;
while ($blah < 9){
	echo "abc ";
	$blah = $blah+1;
}

echo "<br>";

$helper = 0;
do {
	echo "xyz ";
	$helper = $helper +1;
} while ($helper < 9);

echo "<br>";


for ($i=0; $i<9; $i++){
	$var = $i + 1;
	echo "$var ";
}

echo "<br>";


$number = 0;

for ($i='A'; $i<'G'; $i++){
	$number = $number +1;
	echo "$number. $i <br>";

}


//with an array
$abcArray = array("abc ");
$counter = 0;
while ($counter < 9){
	echo $abcArray[0];
	$counter = $counter+1;
}

$numArray = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");






?>

</body>
</html>
