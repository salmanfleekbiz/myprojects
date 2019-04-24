<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('redirect'))
{
	function redirect($link){
		echo '<script>window.location.href = "' . $link. '"; </script>';
	}
}


if ( ! function_exists('print_array'))
{
	function print_array($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}

if ( ! function_exists('successResponse'))
{
	function successResponse($data = ''){
		if(!$data) $data = array();
		echo json_encode(array('success'=> RESPONSE_SUCCESS,'data' => $data));
		die;
	}
}


if ( ! function_exists('errorResponse'))
{
	function errorResponse($data = ''){
		if(!$data) $data = array();
		echo json_encode(array('success'=> RESPONSE_ERROR,'data' => $data));
		die;
	}
}

if ( ! function_exists('format_db_date'))
{
	function format_db_date($date){
		if($date) {
			$split = explode("/",$date);
			return $split[2] . "-" . $split[0] . "-" . $split[1];
		}
		
		return "";
	}
}


if ( ! function_exists('generate_hash'))
{
	function generate_hash($string,$key){
		$CI   =& get_instance();
		$hash = $CI->config->item($key);
		return md5($string.$hash);
	}
}


if ( ! function_exists('validate_email'))
{
	function validate_email($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}

if( ! function_exists('validate_name'))
{
	function validate_name($name){
		if (preg_match('/^([A-Za-z]+)\s?[A-Za-z\s]+$/i', $name))
	    	return true;

	    return false;
	}
}
 
?>