<?php
include('config/init.php');

echoHeader("Event Created", "Event Created");

echo"
<div class='textStyle form'>
	Event sucessfully created! Go to trending events to see it:
	<br><br>
	or... should put a link to it's single event page. but then need to somehow pass info to this page.
	<a href='trendingEvents.php'>Trending Events</a>
</div>";

 ?>
