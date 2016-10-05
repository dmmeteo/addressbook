<?php 
/**
* Class for auth in admin panel
*/
class auth{
	
	protected $user_name = 'admin';
	protected $password  = 'admin';
	protected $session   = 'success';
	/*
	* check login & password
	* @return booleon
	*/
	public function login_check($usre,$pass){
		if (empty($usre) || empty($pass)){
			return false;
		} else {
			if (($usre === $this->user_name) 
				&&($pass === $this->password)) {
				return true;
			} else {
				return false;
			}
		}
	}
	/*
	* auth status true/false and make error/change location
	* and set session 'admin_auth'
	* @return string/function
	*/
	public function login_error($auth_status){
		if ($auth_status === false) {
			return 'Wrong login or password!';
		} elseif ($auth_status === true) {
			header('Location: admin/');
			$_SESSION['admin_auth'] = $this->session;
		}
	}
	/*
	* check is set admin session
	* @return function
	*/
	public function session_isset(){
		session_start();
		if (isset($_SESSION['admin_auth'])) {
			if ($_SESSION['admin_auth'] === $this->session) {
				header('Location: admin/');
			}
		}
	}
	/*
	* security admin panel if session not set/not session
	* @return function
	*/
	public function security_admin(){
		session_start();
		if (!isset($_SESSION['admin_auth'])) {
			header('Location: ../login.php');
		} elseif ($_SESSION['admin_auth'] !== $this->session) {
			header('Location: ../login.php');
		}
	}
	/*
	* logout from admin panel
	* @return function
	*/
	public function logout(){
		session_start();
		if (isset($_SESSION['admin_auth'])) {
			$_SESSION['admin_auth'] = '';
			header('Location: ../');
		}
	}
}