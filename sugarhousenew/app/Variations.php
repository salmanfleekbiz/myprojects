<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
    protected $table = 'variations';
    protected $primaryKey = 'id';
    protected $fillable   = ['id','title','created_at','updated_at'];
    protected $id = 1;
    protected $title;
	protected $created_at;
    protected $updated_at;
}
