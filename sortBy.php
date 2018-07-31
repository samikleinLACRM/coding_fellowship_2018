<?php
include("config/init.php");


echoHeader("Sort By", null);

// echo "
// <div class='textStyle ' style='font-size:15px; background-color:white'>
// 	<div style='font-size:25px'>Sort By:</div><br>
// 	<form name='form1'>
// 		<select name='Sort By' id='sortBy'>
// 			<option value=''>-options-</option>
// 			<option value='Date' id='qwerty'>Date</option>
// 			<option value='Category' id='Category'>Category</option>
// 		</select>
// 	</form>
// </div>
//
// <p id='demo'>";echoSortByDate();echo"</p>
// ";

echo "
	<div class='textStyle ' style='font-size:15px; background-color:white'>
		<div style='font-size:25px'>Sort By:</div><br>
		<a href='sortBy.php'>Date (ASC)</a> <br>
		Categories:
		<div class='dropdown'>
		  <button onclick='myFunction()' class='dropbtn'>-options-</button>
		  <div id='myDropdown' class='dropdown-content'>
		  	";
			returnCats();"
		  </div>
		</div>
	</div>
	</div></div></div></div></div>
";

function returnCats(){
	$allCats=getAllCategories();
	foreach($allCats as $cat){
		echo "<a href='sortBy.php?catID=$cat[catID]'>$cat[name]</a>";
	}
}

echo "</div></div>"; //why is this? idk. but necessary
if(@$_REQUEST['catID'] !=null){
	echoSortByCat($_REQUEST['catID']);
}
else{
	echoSortByDate();
}


// echoEventSortedBy('category', 1);






//
//
// <FORM NAME='form1'>
// <SELECT NAME='select' ONCHANGE='goto(this.form)' SIZE='1'>
// 	<OPTION VALUE=''>-------Choose a Selection-------
// 	<OPTION VALUE='sortBy.php?one=date&two=null'>Date
// 	<OPTION VALUE='accountPage.php?userID=1'>Magenta //do stuff to URL
// 	<OPTION VALUE='html_codes.htm'>HTML Tips
// 	<OPTION VALUE='html_codes_chart.htm'>HTML Code Chart
// 	<OPTION VALUE='javascript_codes.htm'>JavaScript Codes
// 	<OPTION VALUE='216_color_chart.htm'>Color Code Chart
// </SELECT>
// </FORM>

// function goto(form){
// 	var index=form.select.selectedIndex
// 	if (form.select.options[index].value != "0") {
// 		location=form.select.options[index].value;
// 	}
// }
