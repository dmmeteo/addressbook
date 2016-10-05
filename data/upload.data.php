<?php
/**
* GET ALL DATA -> array ($user_list)
*/
require_once '../classes/upload.class.php';

$user_list = array();

//connect to db
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'addressbook';
$connection = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno()) {
	echo 'No connect to MySQL: '.mysqli_connect_errno();
}

# init new object to sort items
$upload = new upload;
$query = $upload->check_GET($_GET['user']);
print_r($query);

echo '<br/>upload data';
//make query 
//$result = mysqli_query($connection, $query);
