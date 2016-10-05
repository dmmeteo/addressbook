<?php 
/*
* function for detect and delete 
* XSS and SQL injects
*/
function strip_data($input_text){
	$input_text = strip_tags($input_text);
	$input_text = htmlspecialchars($input_text);
	$input_text = mysql_escape_string($input_text);
	return $input_text;
}