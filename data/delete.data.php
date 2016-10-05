<?php
# init db connection
require_once '../components/db_connection.php';
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