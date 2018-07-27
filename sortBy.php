<?php
echo "hey, let's get it started in here.";
include('config/init.php');


echoHeader("Sort By", "Sort By:

<form action = ''  method='post'>
	<select name = 'sortBy'>
		<option value='Date'>Date</option>
		<option value='Category'>Category</option>
	</select><br>
	<input type='submit' />
</form>

");

// 
// echo "
// <form action = ''  method='post'>
// 	<select name = 'sortBy'>
// 		<option value='Date'>Date</option>
// 		<option value='Category'>Category</option>
// 	</select><br>
// 	<input type='submit' />
// </form>
//
// ";


echoEventSortedBy("date", null);

// echoEventSortedBy("category", 1);
