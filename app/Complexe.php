<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complexe extends Model
{
	protected $table = 'residential_complexes';
    protected $fillable = [
    	'name',
    	'logo',
    	'representative',
    	'telephone',
    	'country',
    	'city',
    	'address',
    	'complexe_type',
    	'number_houses',
    	'number_in',
    	'number_out',
    	'motorcycles_parking',
    	'motorcycles_places',
    	'bikes_parking',
    	'bikes_places',
    	'cars_parking',
    	'cars_places',
    	'logo'
    ];
}
