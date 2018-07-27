<?php
echo "hey, let's get it started in here.";
include("config/init.php");

?>
<script>

function goto(form){
	var index=form.select.selectedIndex
	if (form.select.options[index].value != "0") {
		location=form.select.options[index].value;
	}
}

</script>




<?php

echoHeader("Sort By", "

<label for='Sort By'>Sort By:</label>
<select name='Sort By' id='sortBy'>
  <option value='Date' id='Date'>Date</option>
  <option value='index.php' id='Category'>Category</option>
</select>


<FORM NAME='form1'>
<SELECT NAME='select' ONCHANGE='goto(this.form)' SIZE='1'>
	<OPTION VALUE=''>-------Choose a Selection-------
	<OPTION VALUE='sortBy.php?one=date&two=null'>Date
	<OPTION VALUE='accountPage.php?userID=1'>Magenta //do stuff to URL
	<OPTION VALUE='html_codes.htm'>HTML Tips
	<OPTION VALUE='html_codes_chart.htm'>HTML Code Chart
	<OPTION VALUE='javascript_codes.htm'>JavaScript Codes
	<OPTION VALUE='216_color_chart.htm'>Color Code Chart
</SELECT>
</FORM>
");

// echoNicely($_REQUEST['one']);
// echoNicely($_REQUEST['two']);

echoEventSortedBy($_REQUEST['one'], $_REQUEST['two']);

// echoEventSortedBy('category', 1);
