<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Base;



class Controller extends Base
{
    //creo un constructor que utilize el middleware de autenticacion
    public function __construct()
    {
    	$this->middleware('auth');
    }
}
