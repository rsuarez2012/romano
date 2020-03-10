<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['attribute_id', 'name', 'description', 'slug'];

    public function attribute()
    {
    	return $this->belongsTo('App\Attribute');
    }
    public function products()
    {
    	return $this->hasMany('App\Product', 'color_id');
    }
    public function productsSize()
    {
    	return $this->hasMany('App\Product', 'size_id');
    }
}
