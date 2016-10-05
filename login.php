<?php
# init new auth object
require_once 'classes/login.class.php';
$auth = new auth;
$auth->session_isset();

if (isset($_POST['submit'])){

	# init auth methods
	$auth_status = $auth->login_check($_POST['user'],$_POST['pass']);
	$error_login = $auth->login_error($auth_status);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<div style="text-align: center;">
		<h3>Admin panel</h3>
		<p style="color: red;">
		<?php echo $error_login; ?>
		</p>
		<form action="login.php" method="post">
			user: <input type="text" name="user" value=""><br><br>
			pass: <input type="password" name="pass" value=""><br><br>
			<input type="reset" value="Reset">
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
</body>
</html>