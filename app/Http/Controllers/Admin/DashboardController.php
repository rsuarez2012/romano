<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Client;
use App\Order;
use App\DetailOrder;
class DashboardController extends Controller
{
    public function index(User $user)
    {

    	/*return view('dashboard', [
    		'users' => $user->take(5)->get()
    	]);*/
    	$products = Product::all();
    	$clients = Client::all();
    	$orders = Order::all();
    	$orders_lasts = Order::orderBy('id', 'DESC')->with('detailorder')->take(10)->get();
    	$products_lasts = Product::orderBy('id', 'DESC')->take(10)->get();
    	$devolutions = Order::where('status', '=', '0');
    	return view('dashboard', compact('products', 'clients', 'orders', 'orders_lasts', 'products_lasts', 'devolutions'));
    } 
}
