
<script src="/include/jquery.js"></script>



<script type='text/javascript'>

function ToggleTheBox(){
	// console.log("We're in the function");
	console.log('<?php echo date('Y-m-d') ?>');
	$('.TheBox').toggle();
}

</script>



<a href='#' onclick='ToggleTheBox();'>Toggle the box</a>

<div class='TheBox' style='background-color:#ccc;'>
		This is the box
</div>
