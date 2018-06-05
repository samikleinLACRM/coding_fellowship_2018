<?php
include('config/config.php');
include('config/init.php');

echo "
	<div class='container'>
		<img class='centerImage' src='pics/galaxypic.jpg' alt='Galaxy' height=500>
		<div class='centeredPictureText'>Welcome to Sami Klein's website!</div>
	</div>
	<p><br></p>
";

echoHeader("Sami's Page", null);

echo "
	<div class='row'>
	  <div class='left'>
	  	<div class='card'>
	    	<h2>About me</h2>
	    	<p>I'm Sami and I'm doing a coding fellowship with LACRM this summer. Woo!</p>
			<p>Next: put a picture of me in here, also make columns of writing! </p>
			<p> words </p>
			<p> words words words words words wordswords words wordswords
					words wordswords words words
					words words wordswords words wordswords words
					wordswords words words wordswords words words
					wordswords words words wordswords words words
					wordswords words words</p>
		</div>
	  </div>
	  <div class='right'>
	  	<div class='card'>
	    	<h2>Recent Posts:</h2>
	    	<p>Link up recent posts here? With little views of them like they have on professional pages!</p>
		</div>
	  </div>
	</div>
";

echoFooter();
?>
