<?php

function SubmitApplication($Name, $Phone, $Position){ //these can be called anything. name scope of function. just order matters
	die("$Name just applied for Position: $Position. You can reach them at $Phone");
}

//you want this in this file, and above the form.

$Errors = array();
if(isset($_REQUEST['JobApplication'])){ //is job application in request? if so, form has been submitted

	if(trim($_REQUEST['Name'] == '')){  //or could put a ! in front of request, and don't need an ==
		$Errors['Name'] = "required";
	}
	if(trim($_REQUEST['Phone'] == '')){
		$Errors['Phone'] = "required";
	}

	if(sizeof($Errors) == 0){
		SubmitApplication(
			$_REQUEST['Name'],  //these have to match the form
			$_REQUEST['Phone'],
			$_REQUEST['Position']
		);
	}

}

// var_dump($Errors);

if(sizeof($Errors) > 0){
	echo "THERE WERE ERRORS";
}


echo "
<h1>
        Job Application Form
</h1>
<form action='' method='post'>
        Name:
        <input type='text' name='Name' value='$_REQUEST[Name]'/><br />

        Phone:
        <input type='text' name='Phone' /><br />

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
