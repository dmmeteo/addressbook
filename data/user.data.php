<?php //model
/**
* GET ALL DATA -> array ($user_list)
*/
require_once '../classes/user.class.php';


//connect to db
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'addressbook';
$connection = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno()) {
	echo 'No connect to MySQL: '.mysqli_connect_errno();
}

$user_id = $_GET['user'];
$result = mysqli_query($connection, "SELECT * FROM user WHERE id='$user_id'");

/*
* check admin session to know
* wich content us
*/
while ($row = mysqli_fetch_array($result)) {
	$userById = new userById($row);
}