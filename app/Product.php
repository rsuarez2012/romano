<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'sku',
    	'stock',
    	'buy',
    	'category_id',
    	'brand_id',
    	'color_id',
    	'size_id',
    	'condition',
    ];
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }
    public function term()
    {
    	return $this->belongsTo('App\Term','color_id');
    }
    public function termSize()
    {
    	return $this->belongsTo('App\Term','size_id');
    }
     public function Productwarehouses()
    {
        return $this->hasMany('App\ProductWarehouse');
    }
    public function getStatusAttribute($value='')
    {
        switch($this->condition)
        {
            //1=madre,2=padre,3=hijo(a),4=conyuge,5=otro,
            case 1:
                return 'Activo';
                break;
            
            case 0:
                return 'Agotado';
                break;
        }

    }
}
