<?php

// practicing a double array

//
// $practiceArray=array(
// 	0=> array(
// 		"blah"=>"this is blah"
// 		""
// 	)
// 	1=>
//
//
//
// );


// var_dump($practiceArray);
// die("test");










$weatherConditions=array(
	"rain", "sunshine", "clouds", "hail", "sleet", "snow", "wind"
	);

// echo "I like $weatherConditions[0]";
echo "We've seen all kinds of weather this month.
 At the beginning of the month, we had $weatherConditions[5] and $weatherConditions[6].
 Then came $weatherConditions[1] with a few $weatherConditions[3] and some $weatherConditions[0].
 At least we didn't get any $weatherConditions[4] or $weatherConditions[5].";

echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";

$countries=array(
	"Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London"
);

for ($x=0; $x<10; $x++) {
	echo "$countries[$x] , ";
}

echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";

$p = 0;
do {
	echo "$countries[$p] , ";
	$p++;
} while ($p < 10);

echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";

for ($x=0; $x<10; $x++) {
	echo " <ul>$countries[$x] , </ul>";
}

echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";

array_push($countries,"Los Angeles","Calcutta", "Osaka", "Beijing");
sort($countries);
for ($x=0; $x<14; $x++) {
	echo " <ul>$countries[$x] , </ul>";
}


 ?>
