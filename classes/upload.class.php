<?php
/**
* class for make upload query
*/
class upload{
	/*
	* default query property
	*/
	public $edit_query = 'UPDATE user SET ';
	public $add_query = 'INSERT INTO user ';
	public $error_file = '';


	/*
	* get properties form db
	* to us in extend classes
	*/
	public function check_GET($GET){
		session_start();
		if (isset($GET)) {
			$_SESSION['user'] = $GET;
			return 'session start>user: '.$GET;

		} elseif (!empty($_SESSION['user'])) {
			$start_query .= $this->edit_query;

			# kill session 
			$_SESSION['user'] = '';

			$query = $this->check_POST($start_query);
			return $query;

		} elseif (empty($_SESSION['user'])){
			$start_query .= $this->add_query;

			$query = $this->check_POST($start_query);
			return $query;
		}
	}
	/*
	* private function for make query
	* return string
	*/
	private function check_POST($start_query){
		$result = $start_query;
		# add values
		foreach ($_POST as $key => $value) {
			$result .= " $key='$value'";
		}
		# add photo
		if (isset($_FILES['file'])){
			$photo = $this->uplode_file();
			$result .= " photo='$photo'";
		}
		# delete submit
		$result = preg_replace("~(.+)(submit='submit')(.+)~", '$1$3', $result);

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