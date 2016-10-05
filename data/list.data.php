<?php
/**
* GET ALL DATA -> array ($user_list)
*/
require_once '../classes/list.class.php';
require_once '../classes/search.class.php';

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
$search = new search;
$query = $search->check_GET($_GET);
echo $query;

//make query 
$result = mysqli_query($connection, $query);

/*
* check admin session to know
* wich content us
*/
if ($_SESSION['admin_auth'] === 'success'){
	while ($row = mysqli_fetch_array($result)) {
		$user_list[] = new adminList($row);
	}
} else {
	while ($row = mysqli_fetch_array($result)) {
		$user_list[] = new publicList($row);
	}
}
