<?php
# init strip_data()
require_once '../components/strip_data.php';

/**
* class for make upload query
*/
class upload{
	/*
	* default query property
	*/
	public $edit_query = 'UPDATE user SET ';
	public $add_query = 'INSERT INTO user (first_name, last_name, email, country, city, note, photo) VALUES (';
	public $success_message = '';
	public $items_array;
	public $error_file = '';

	/*
	* get properties form db
	* to us in extend classes
	*/
	public function check_GET($GET){
		session_start();
		if (isset($GET)) {
			# security(only integers must be in $_SESSION['user'])
			$number = intval($GET);
			# init session
			$_SESSION['user'] = $number;

		} elseif ( (!empty($_SESSION['user'])) && ($_POST['submit'] === 'submit')) {
			# set start query string
			$start_query .= $this->edit_query;
			# set items in query string
			$query = $this->check_edit_POST($start_query);
			# kill session
			$_SESSION['user'] = '';
			return $query;

		} elseif ( (empty($_SESSION['user'])) && ($_POST['submit'] === 'submit')){
			# set start query string
			$start_query .= $this->add_query;
			# set items in query string
			$query = $this->check_add_POST($start_query);
			return $query;

		} elseif ( (empty($GET)) && (!empty($_SESSION['user'])) ) {
			# kill session
			$_SESSION['user'] = '';
		}
	}
	/*
	* private function for make edit query
	* return string
	*/
	private function check_edit_POST($start_query){
		$result = $start_query;
		# add photo
		if (!empty($_FILES['file']['name'])){
			$photo = $this->uplode_file();
			$result .= " photo='$photo',";
		}
		# add values
		foreach ($_POST as $key => $value) {
			# strip_data and add items
			$key = strip_data($key);
			$value = strip_data($value);

			# validation fanction
			if ( ($key === 'first_name') && (empty($value))
				|| ($key === 'last_name') && (empty($value))
				|| ($key === 'email') && (empty($value))
				|| ($key === 'country') && ($key['country'] != 0)
				|| ($key === 'city') && ($key['city'] != 0) ){
				$this->success_message = "<br/><span style='color: red;'>$key is required</span>";
				# rememder item to set in form to other try
				foreach ($_POST as $key => $value) {
					$key = strip_data($key);
					$value = strip_data($value);
					$this->items_array[$key] = $value;
				}
				return false;
			}

			$result .= " $key='$value',";
		}
		# delete submit
		$result = preg_replace("~(.+)(, submit='submit',)(.?+)~", '$1$3', $result);
		# set user id where update items
		$result .= ' WHERE id='.$_SESSION['user'];
		# set success_message
		$this->success_message = "<br/><p style='color: green;'>User is edit!</p>";

		return $result;
	}
	/*
	* private function for make add query
	* return string
	*/
	private function check_add_POST($start_query){
		$result = $start_query;
		foreach ($_POST as $key => $value) {
			# security
			$value = strip_data($value);

			# validation fanction
			if ( ($key === 'first_name') && (empty($value))
				|| ($key === 'last_name') && (empty($value))
				|| ($key === 'email') && (empty($value))
				|| ($key === 'country') && (empty($value))
				|| ($key === 'city') && (empty($value)) ){
				$this->success_message = "<br/><span style='color: red;'>$key is required</span>";
				# rememder item to set in form to other try
				foreach ($_POST as $key => $value) {
					$key = strip_data($key);
					$value = strip_data($value);
					$this->items_array[$key] = $value;
				}
				return false;
			}

			# add values
			$result .= " '$value',";
		}
		# add photo
		$photo = $this->uplode_file();
		$result .= " '$photo')";
		# delete submit
		$result = preg_replace("~(.+)('submit',)(.?+)~", '$1$3', $result);
		# set success_message
		$this->success_message = "<br/><p style='color: green;'>New is add!</p>";
		return $result;
	}
	/*
	* private function for upload files
	* return file name/error
	*/
	private function uplode_file(){
		$allowed_exts = array('jpg', 'gif', 'png');
		$extension = end(explode('.', $_FILES['file']['name']));
		/*
		* check file type
		*/
		if ((($_FILES['file']['type'] == 'image/gif')
			|| ($_FILES['file']['type'] == 'image/jpeg')
			|| ($_FILES['file']['type'] == 'image/png'))
			&& in_array($extension, $allowed_exts)) {
			if ($_FILES['file']['error'] > 0) {
				/*
				* if file error
				*/
				$this->error_file = 'Invalid file';
				return '';
			} else {
				/*
				* if file not exists
				* upload it and return file name
				* else only return file name
				*/
				if (!file_exists('../assets/images/' . $_FILES['file']['name'])) {
					move_uploaded_file($_FILES['file']['tmp_name'], '../assets/images/' . $_FILES['file']['name']);
					return $_FILES['file']['name'];
				} else {
					return $_FILES['file']['name'];
				}
			}
		} else {
			/*
			* if file is not image type
			*/
			$this->error_file = 'file is not image';
			return '';
		}
	}
}