<?php

include('config/config.php');
include('config/init.php');


insertComment($_REQUEST['blogPostID'],$_REQUEST['commentAuthor'], $_REQUEST['content']);


echoAllComments($_REQUEST['blogPostID']);
