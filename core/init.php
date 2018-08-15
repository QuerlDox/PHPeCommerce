<?php

$db =  mysqli_connect('localhost','root','','tutorial');

if(mysqli_connect_error()){
	echo "Database connection failed: ".mysqli_connect_error();
	die();
}

require_once '../config.php';
require_once BASEURL.'helpers/helpers.php';