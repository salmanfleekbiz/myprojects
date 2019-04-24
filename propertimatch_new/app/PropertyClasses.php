<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyClasses extends Model {

	protected $table = 'emt_property_classes';

	public function added()
	{
		return $this->hasMany('App\PropertiesClasses','class_id');
	}

}
