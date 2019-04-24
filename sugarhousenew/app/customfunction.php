<?php

namespace App\Helpers\Envato;
use Illuminate\Support\Facades\DB;

class Customfunction
{

public static function searcharray($value, $key1, $key2, $array) {
  foreach ($array as $k => $val) {
  	if(true === in_array($value, range($val[$key1], $val[$key2])))
	{
		return $val['id'];
	}
  }
  return null;
}
}
?>