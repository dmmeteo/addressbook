<?php //model
/**
* GET ALL DATA -> array ($user_list)
*/
require_once '../classes/user.class.php';
# init db connection
require_once '../components/db_connection.php';

$user_id = $_GET['user'];
$result = mysqli_query($connection, "SELECT * FROM user WHERE id='$user_id'");

/*
* check admin session to know
* wich content us
*/
while ($row = mysqli_fetch_array($result)) {
	$userById = new userById($row);
}