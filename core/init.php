<?php

$db =  mysqli_connect('localhost','root','','tutorial');

if(mysqli_connect_error()){
	echo "Database connection failed: ".mysqli_connect_error();
	die();
}

define('BASEURL', '/phpECommerce/phpECommerce/');