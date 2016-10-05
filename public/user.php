<?php 
#init data user by id
require_once '../data/user.data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $userById->first_name.' '.$userById->last_name; ?></title>
</head>
<body>
	<div style="text-align: center;">
		<a href="/">address book</a> | <a href="/login.php">login</a>
	</div>
	<hr>
	<div style="margin: auto; text-align: center; width: 750px;">
		<div>
			<p style="display: inline-block; text-align: left; padding-right: 250px; padding-bottom: 50px;">
				<br>Name: <?php echo $userById->first_name.' '.$userById->last_name; ?>
				<br>Location: <?php echo $userById->city.', '.$userById->country; ?>
				<br>Email: <?php echo $userById->email; ?>
			</p>
			<img style="width: 150px; height: 150px; display: inline-block;" src="../assets/images/<?php echo $userById->photo; ?>" alt=""/>
		</div>
		<div style="text-align: left;">
			Note:<br/>
			<hr/>
			<?php echo $userById->note; ?>
		</div>
		<br><br><a href="/public/">Back to the list</a>
	</div>
</body>
</html>