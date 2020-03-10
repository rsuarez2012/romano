<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductWarehouse extends Model
{
    protected $fillable = ['product_id', 'quantity_in', 'upload_date'];
    public function product()
	{
		return $this->belongsTo('App\Product', 'product_id');
	}
}
