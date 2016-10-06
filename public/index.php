<?php 
# init data list
require_once '../data/list.data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Address book | public</title>
</head>
<body>
	<div style="text-align: center;">
		<a href="/">address book</a> | <a href="/login.php">login</a>
	</div>
	<hr>
	<div style="text-align: center;">

		<form action="index.php" method="get">
			kayword: <input type="text" name="kayword">
			country: <select name="country" id="country_id">
				<option value="0">--Select Country--</option>
				<option value="USA">USA</option>
				<option value="Ukraine">Ukraine</option>
				<option value="Canada">Canada</option>
			</select>
			city: <select name="city" id="city_id" disabled="disabled">
				<option value="0">--Select City--</option>
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
				</tr>
			</thead>

			<tbody> <!-- items -->
				<?php //view
				foreach ($user_list as $item){
					echo($item->print_item());
				}?>
			</tbody>

			<tfoot>
				<tr>
					<td style="text-align: left;" colspan="3">Show: 
						<a href="?limit=2&page=1">2</a> |
						<a href="?limit=5&page=1">5</a> |
						<a href="?limit=10&page=1">10</a> |
						<a href="?limit=<?php echo $count_rows; ?>&page=1">All</a>
						 pre page
					</td>
					<td style="text-align: right;" colspan="3">
						<?php echo $pagination; ?>
					</td>
				</tr>
			</tfoot>
		</table>

	</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/selects.js"></script>
</body>
</html>