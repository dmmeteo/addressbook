<?php 
# init db connection
require_once '../components/db_connection.php';

# init ajax query
$country = $_GET['country'];
# make sql query
$query = mysqli_query($connection, "SELECT * FROM city WHERE country_id='$country'");
# make array 'result'
if ($query) {
	$num = mysqli_num_rows($query);
	$i = 0;
	while ($i < $num) {
		$citys[$i] = mysqli_fetch_assoc($query);
		$i++;
	}
	# set citys array in $result
	$result = array('citys'=>$citys);
}
else {
	$result = array('type'=>'error');
}
# set json type to $result
print json_encode($result);