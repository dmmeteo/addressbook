<?php
/**
* class for construct var of query items
*/
class userById{

	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $country;
	public $city;
	public $photo;
	public $note;
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
		if ( (empty($row['photo']))){
			$no_avator = 'no_avator.png';
			$this->photo = $no_avator;
		} else {
			$this->photo = $row['photo'];
		}
		$this->note = $row['note'];
	}
}