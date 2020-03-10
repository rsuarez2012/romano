<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'dni',
    	'phone',
    	'email'
    ];
    public function order()
    {
    	return $this->hasMany('App\Order');
    }
    public function getClientNameAttribute()
	{
		return $this->dni.'-'.$this->first_name.' '.$this->last_name;
	}
}
