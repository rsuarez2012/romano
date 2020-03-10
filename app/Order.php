<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    	'client_id',
    	'date_order',
    	'order_number',
        'status',
        
    ];
    
	public function client()
	{
		return $this->belongsTo('App\Client');
	}
    public function detailorder()
	{
		return $this->hasMany('App\DetailOrder');
	}
    /*public function detailsaleThisDay()
    {
        return $this->hasMany('App\DetailSale')->whereDay('detail_sale.created_at', date('d'));
    }*/

    public function products()
    {
        return $this->belongsToMany('App\Product');//, 'detailsale')->withPivot('product_id');
    }
    public function getStatusTypeAttribute()
    {
    	switch ($this->status) {
    		case 0:
    			return 'Cancelado';
    			break;
    		
    		default:
    			return 'Procesado';
    			break;
    	}
    }
    
}
