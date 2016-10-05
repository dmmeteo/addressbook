<?php 
# init new auth object
require_once '../classes/login.class.php';
$auth = new auth;
$auth->security_admin();
# init delete function
require_once '../data/delete.data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Address book | admin</title>
</head>
<body>
	<div style="text-align: center;">
		<a href="/">address book</a> | <a href="/logout.php">logout</a>
	</div>
	<hr>
	<div style="text-align: center;">

		<form action="index.php" method="get">
			kayword: <input type="text" name="kayword">
			country: <select name="country">
				<option value="">::ALL::</option>
				<option value="USA">USA</option>
			</select>
			city: <select name="city">
				<option value="">::ALL::</option>
				<option value="New York">New York</option>
			</select><br><br>
			<input type="submit" name="submit" value="search">
		</form><br><br>

		<table style="margin: auto;" border="1" width="750">
			<thead>
				<tr>
					<td><a href="?sort=id">id</a></td>
					<td><a href="?sort=first_name">name</a></td>
					<td><a href="?sort=country">country</a></td>
					<td><a href="?sort=city">city</a></td>
					<td colspan="2"><a href="">action</a></td>
				</tr>
			</thead>

			<tbody> <!-- items -->
				<?php //view
				require_once '../data/list.data.php';
				foreach ($user_list as $item){
					echo($item->print_item());
				}?>
			</tbody>

		</table>

	</div>
</body>
</html>