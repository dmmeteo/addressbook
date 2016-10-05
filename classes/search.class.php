<?php 
# init strip_data()
require_once '../components/strip_data.php';
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
			# strip_data and add items
			$key = strip_data($key);
			$value = strip_data($value);

			# country search
			if ( ($key == 'country') && (!empty($value)) ){
				$result .= " && $key='$value'";

			# city search
			} elseif ( ($key == 'city') && (!empty($value)) ){
				$result .= " && $key='$value'";

			# kayword search
			} elseif ( ($key == 'kayword') && (!empty($value)) ){
				$result .= " && first_name LIKE '%$value%' || last_name LIKE '%$value%' || email LIKE '%$value%'";

			#sort by headers
			} elseif ( ($key == 'sort') && (!empty($value)) ){
				$result .= " ORDER BY $value";

			# pagination
			} elseif ( ($key == 'page') && (!empty($value)) ) {
				# get values
				$limit = intval($GET['limit']);
				if ($limit <= 0){
					$limit = 5;
				}
				$page = intval($GET['page']);
				if ($page <= 0){
					$page = 1;
				}
				# get value start_from
				$start_from = ($page - 1) * $limit;
				$result .= " LIMIT $start_from, $limit";
			}
		}
		$result = preg_replace("~(.+)(user &&)(.+)~", "$1 user WHERE $3", $result);
		return $result;
	}
	/*
	* function for pagination in list area
	*/
	public function pagination($max_records, $num_records){
		$max_records = intval($max_records);
		if ($max_records === 0){
			$max_records = $num_records;
		}

		$num_pages = intval(($num_records - 1) / $max_records) + 1;
		
		# init farword and next pages links
		$farword = intval($_GET['page']) - 1;
		if ($farword < 1){
			$farword = 1;
		}
		$next = intval($_GET['page']) + 1;
		if ($next > $num_pages){
			$next = $num_pages;
		}

		$result .= "<a href='?limit={$max_records}&page={$farword}'>farword</a> |";
		for ($i=1; $i <= $num_pages; $i++) { 
			$result .= "<a href='?limit={$max_records}&page={$i}'>$i</a> |";
		}
		$result .= "<a href='?limit={$max_records}&page={$next}'>next</a>";
		return $result;
	}
}