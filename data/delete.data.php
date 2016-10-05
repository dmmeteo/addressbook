<?php
//connect to db
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'addressbook';
$connection = mysqli_connect($host,$user,$pass,$db);
if (mysqli_connect_errno()) {
	echo 'No connect to MySQL: '.mysqli_connect_errno();
}
/*
* check GET for delete user
* and reload location
*/
if (isset($_GET['del'])) {
	if (!empty($_GET['del'])) {
		$del_id = (int)$_GET['del'];
		$delete_user = mysqli_query($connection, "DELETE FROM user WHERE id='$del_id'");
		header('Location: /admin/'); 
	}
}