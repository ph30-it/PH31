<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
	use SoftDeletes;

    protected $fillable= [
    	'name', 'age', 'breed_id'
    ];

    public function breed()
    {
    	return $this->belongsTo('App\Breed');
    }

    public function scopeOfBreed($query, $breedId)
    {
    	return $query->where('breed_id', $breedId);
    }
}
