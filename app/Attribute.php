<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['attribute'];
    public function terms()
    {
    	return $this->hasMany('App\Term', 'attribute_id');
    }
    
}
