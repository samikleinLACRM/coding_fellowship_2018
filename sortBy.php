<?php
include("config/init.php");


echoHeader("Sort By", null);

echo "
	<div class='textStyle ' style='font-size:15px; background-color:white'>
		<div style='font-size:25px'>Sort By:</div><br>
		<a href='sortBy.php'>Date (ASC)</a> <br>
		Categories:
		<div class='dropdown'>
		  <button onclick='myFunction()' class='dropbtn' id='optionsBTN'>
		  ";
		  if(isset($_REQUEST['catID'])){
			  $cat = getCategoryByID($_REQUEST['catID']);
			  echo $cat['name'];
		  }
		  else{
			  echo "-options-";
		  }
		 echo  "</button>
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
