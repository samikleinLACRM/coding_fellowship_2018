<?php

include('config/config.php');
include('config/init.php');

function SubmitApplication($Name, $Phone, $Position){ //these can be called anything. name scope of function. just order matters
	die("$Name just applied for Position: $Position. You can reach them at $Phone");
}

//if there is nothing in the field, add an error called (the field name), consisting of the word "required"
function validateFormField($formField){
	global $Errors;

	if(!$_REQUEST[$formField]){
		$Errors[$formField] = 'required';
	}
	// echoNicely($Errors);
	// return $Errors;
}


// echoNicely($_REQUEST);
//you want this in this file, and above the form.

$Errors = array();
if(isset($_REQUEST['JobApplication'])){ //is job application in request? if so, form has been submitted


	validateFormField('Name');
	validateFormField('Phone');

	// if(!$_REQUEST['Name']){
	// 	$Errors['Name']='required';
	// }
	// if(!$_REQUEST['Phone']){
	// 	$Errors['Phone']='required';
	// }

	if(sizeof($Errors) == 0){
		SubmitApplication(
			$_REQUEST['Name'],  //these have to match the form
			$_REQUEST['Phone'],
			$_REQUEST['Position']
		);
	}
}


if(sizeof($Errors) > 0){
	foreach($Errors as $Index=>$Error){
		echo "
		<div>
			Error in the $Index field: $Error.
		</div>
		";
	}
}


//the @ sign before the request makes it so that it shuts up the error message when nothing has been inputted yet.


// tried this, to keep the value in the position? put in between option and value
//  "if($_REQUEST['name'] == 'Fellow') { selected="true" }"


function echoFormField($name, $type, $value){
	echo "$name:
	<input type='$type' name='$name' value='".@$_REQUEST[$value]."'/><br />";
}


echo "
<h1> Job Application Form </h1>
<form action='' method='post'>";
	echoFormField('Name', 'text', 'Name');
	echoFormField('Phone', 'text', 'Phone');
echo "
        Position:
        <select name='Position'>
                <option value='Fellow'>Coding fellow</option>
                <option value='DevIntern'>Developer intern</option>
                <option value='CrmcIntern'>CRM coach intern</option>
                <option value='Dev'>Full-time developer</option>
                <option value='Crmc'>Full-time CRM coach</option>
        </select>
        <br/><br/>
        <input type='submit' name='JobApplication' value='Submit your application' />
</form>
";
