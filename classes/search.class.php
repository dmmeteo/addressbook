<?php 
/**
* Class for make sql query
* if user search
*/
class search{
	/*
	* default query property
	*/
	private $query = 'SELECT * FROM user';
	/*
	* check $_GET for sql query
	* @return sql query: string
	*/
	public function check_GET($GET){
		$result .= $this->query;
		foreach ($GET as $key => $value) {
			if ( ($key == 'country') && (!empty($value)) ){
				$result .= " && $key='$value'";

			} elseif ( ($key == 'city') && (!empty($value)) ){
				$result .= " && $key='$value'";

			} elseif ( ($key == 'kayword') && (!empty($value)) ){
				$result .= " && first_name='$value' || last_name='$value' || email='$value'";

			} elseif ( ($key == 'sort') && (!empty($value)) ){
				$result .= " ORDER BY $value";
			}
		}
		return preg_replace("~(.+)(user &&)(.+)~", "$1 user WHERE $3", $result);
	}
}