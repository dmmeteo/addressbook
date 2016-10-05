<?php
/**
* GET ALL DATA -> array ($user_list)
*/
# init class list
require_once '../classes/list.class.php';
# init class search
require_once '../classes/search.class.php';
# init db connection
require_once '../components/db_connection.php';


$user_list = array();
# init new object to sort items
$search = new search;

# count rows for pagination
$count_rows = mysqli_num_rows(mysqli_query($connection, 'SELECT * FROM user'));
$pagination = $search->pagination($_GET['limit'],$count_rows);

# init query
$query = $search->check_GET($_GET);

# make query 
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
