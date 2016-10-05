<?php 
/*
* db connection config
*/
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'addressbook';
$connection = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno()) {
	echo 'No connect to MySQL: '.mysqli_connect_errno();
}