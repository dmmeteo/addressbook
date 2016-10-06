<?php 
# init new auth object
require_once '../classes/login.class.php';
$auth = new auth;
$auth->security_admin();
#init data user by id
require_once '../data/user.data.php';
#init data for upload
require_once '../data/upload.data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Address book | edit user</title>
</head>
<body>
	<div style="text-align: center;">
		<a href="/">address book</a> | <a href="/logout.php">logout</a>
	</div>
	<hr>


	<div style="margin: auto; text-align: center; width: 300px;">
		<form style="text-align: left;" method="post" enctype="multipart/form-data" action="edit.php">
			<br><br><label>Note: records marked with <span style="color: red;">*</span> are required</label>
			<?php echo $upload ->success_message; ?>
			<br><br>
			<span style="color: red;">*</span>
			first name: <input style="float: right;" type="text" name="first_name" 
			value="<?php echo $userById->first_name . $upload ->items_array['first_name']; ?>">

			<br><br>
			<span style="color: red;">*</span>
			last name: <input style="float: right;" type="text" name="last_name" 
			value="<?php echo $userById->last_name . $upload ->items_array['last_name']; ?>">

			<br><br><span style="color: red;">*</span>
			email: <input style="float: right;" type="text" name="email" 
			value="<?php echo $userById->email . $upload ->items_array['email']; ?>">

			<br><br><span style="color: red;">*</span>
			country: <select style="float: right; width: 173px;" name="country" id="country_id">
				<option value="0">--Select Country--</option>
				<option value="USA">USA</option>
				<option value="Ukraine">Ukraine</option>
				<option value="Canada">Canada</option>
			</select>

			<br><br><span style="color: red;">*</span> 
			city: <select style="float: right; width: 173px;" name="city" id="city_id" disabled="disabled">
				<option value="0">--Select City--</option>
			</select>

			<br><br><input style="width: 300px;" type="file" id="upload" name="file">
			<br><br><div id="preview" style="width: 150px; height: 150px; border: 1px dashed #333;">
				<img style="width: 150px; height: 150px;" id='old' src="../assets/images/<?php echo $userById->photo; ?>"/>
			</div>

			<br><br><br>notes: <br>
			<textarea rows="8" cols="40" name="note"><?php echo $userById->note. $upload ->items_array['note']; ?></textarea>
			<br><br>
			<input type="submit" name="submit" value="submit">
			<input type="reset" value="reset">
		</form>
		<br><br><a href="/admin/">Back to the list</a>
	</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/selects.js"></script>
<script type="text/javascript" src="../js/preview.js"></script>
</body>
</html>