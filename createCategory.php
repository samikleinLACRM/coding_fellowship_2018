<?php
include('config/init.php');


if(isset($_SESSION['userID'])){
	$pageName="Create Your Own Category";
}
else{
	$pageName=null;
}


echoHeader("Create Your Category", $pageName);

if(!isset($_SESSION['userID'])) {  //&& !empty($_SESSION['userID']) <-- had this before. not sure if necessary
	echo "
	<div class= 'textStyle form'>
		Sorry! You must be logged in to create a category. Please log in here:
		<br><br>
		<a href='logInEP.php'>Log In</a>
	</div>
	";
	die();
}


//form
$Errors = array();
if(isset($_REQUEST['CreateCategory'])){ //
	areWordsInField('Name');

	if(sizeof($Errors) == 0){
		insertCategory(
			$_REQUEST['Name'],
			$_REQUEST['color']
		);

		header("Location: categoryCreated.php");
		exit();
	}
}




//echo's form
echo "
<div class='textStyle form'>
	<div style='color:red'>";
	if(sizeof($Errors) > 0){
		foreach($Errors as $Index=>$Error){
			echo "*$Index $Error<br>";
		}
	}

$allCategories=getAllCategories();

echo "
	</div>
	<p style='font-size:18px'>Create Category:</p>
	<form action='' method='post'>
	Name of category: <input type='text' name='Name' value='".@$_REQUEST['Name']."'><br>
	Color of category: <input type='color' name='color' value='#ff0000'>
	<br><br><br>
	<input type='submit' name='CreateCategory' value='Create Category'/>
	</form>
</div>
";




 ?>
