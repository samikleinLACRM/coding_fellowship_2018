<?php
// include('config/config.php');
include('config/init.php');
 ?>


<script src="jsFiles/jquery.js"></script>

<!-- <script type='text/javascript'>

$(function(){

	$.ajax({
		type: 'GET',
		url: /ajax/changeNumber.php
	});

});

</script> -->







<script type='text/javascript'>

function ToggleTheBox(){
	// console.log("We're in the function");
	console.log('<?php echo date('Y-m-d') ?>');
	$('.TheBox').toggle();
}

</script>



<script type='text/javascript'>

function fadeThisOut(){

	console.log('<?php echo "hey"; ?>');
	$('.theFadeThing').fadeOut();
}


</script>

<script type='text/javascript'>

$(function(){

	$('.button1').on('click', function(){
		$('.panel1').fadeToggle(200);
	});
	$('.button2').on('click', function(){
		$('.panel2').fadeToggle(200);
	});
	$('.button3').on('click', function(){
		$('.panel3').fadeToggle(200);
	});


});

</script>




<script type='text/javascript'>

$(document).ready(
	function(){
		console.log("We're in the function hi hi");
		$('body').fadeIn(3000);
	}
);

</script>


<script type='text/javascript'>

$(function() {
	$('.panel1').hide(3000).show(1000).slideUp(1000).slideDown(500);
	$('.panel1').css({
		color:'red',
		fontWeight:'bold'
	});
	$('.panel1').html('my something');
});
</script>


<p id="demo">HIIIIIIII</p>


<script type='text/javascript'>

function clickNumber(){

// document.getElementById("demo").innerHTML = 5 + 6;


//tyler would recommend post instead of get
$.get('ajax/changeNumber.php').done(function(data) {
	console.log(data);
	document.getElementById("demo").innerHTML = data;

}).fail(function(data) {
	console.log('Error: ' + data);
});
}


</script>



<a href='#' onclick='clickNumber();'>here would be an upvote img or something</a>

<div class='numberToChange' style='background-color:#ccc; '>

<?php
$var=12;
echo $var;
 ?>

</div>



<html>
<head>
		<title> This is the head</title>
</head>
<body style='display:none'><h1>heyhey</h1></body>
</html>









<a href='#' onclick='ToggleTheBox();'>Toggle the box</a>

<div class='TheBox' style='background-color:#ccc;'>
		This is the box
</div>


<a href='#' onclick='fadeThisOut();'>Click to Fade this out</a>

<div class='theFadeThing' style='background-color:#ccc;'>
		This is the thing to fade

</div>
