<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breed extends Model
{
	use SoftDeletes;

    protected $fillable= [
    	'name'
    ];

    public function cats()
    {
    	return $this->hasMany('App\Cat');
    }
    
}
