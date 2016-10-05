<?php
/**
* 'abstract' class for construct others classes, not self
*/
abstract class userList{

	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $country;
	public $city;
	public $photo;
	
	/*
	* 'abstract' method for construct in others classes
	* and do not forget about it
	*/
	abstract public function print_item();

	/*
	* get properties form db
	* to us in extend classes
	*/
	function __construct($row){
		$this->id = $row['id'];
		$this->first_name = $row['first_name'];
		$this->last_name = $row['last_name'];
		$this->email = $row['email'];
		$this->country = $row['country'];
		$this->city = $row['city'];
		$this->photo = $row['photo'];
	}
}

class adminList extends userList{

	public function print_item(){
		echo '<tr>';
		echo '<td>'.$this->id.'</td>';
		echo '<td>'.$this->first_name.' '.$this->last_name.'</td>';
		echo '<td>'.$this->country.'</td>';
		echo '<td>'.$this->city.'</td>';
		echo '<td><a href="">[edit]</a></td>';
		echo '<td><a onclick="return confirm(\'Do you really want to delete the record?\');" href=?del='.$this->id.'>[delete]</a></td>';
		echo '</tr>';
	}
}
class publicList extends userList{

	public function print_item(){
		echo '<tr>';
		echo '<td>'.$this->id.'</td>';
		echo '<td><a href="user.php?user='.$this->id.'">'.$this->first_name.' '.$this->last_name.'</a></td>';
		echo '<td>'.$this->country.'</td>';
		echo '<td>'.$this->city.'</td>';
		echo '</tr>';
	}
}