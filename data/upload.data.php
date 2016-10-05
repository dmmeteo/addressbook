<?php
/**
* GET ALL DATA -> array ($user_list)
*/
# init class upload
require_once '../classes/upload.class.php';
# init db connection
require_once '../components/db_connection.php';


$user_list = array();

# init new object to sort items
$upload = new upload;
$query = $upload->check_GET($_GET['user']);

//make query 
if (!empty($query)){
	$result = mysqli_query($connection, $query);
}

