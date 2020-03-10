<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Client;
class ClientController extends Controller
{
    //public function index(User $user)
    public function index()
    {

    	/*return view('dashboard', [
    		'users' => $user->take(5)->get()
    	]);*/
    	$customers = Client::all();
    	return view('admin.customers.index', compact('customers'));
    } 
    public function store(Request $request)
    {   

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        //$client = $request->all();
        $client = Client::create($request->all());
        /*$client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->dni = $request->dni;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->save();*/
        $notification = array([
            'message' => 'Cliente Registrado con exito.!',
            'alert-type' => 'success'
        ]);

        return redirect()->route('customers.index')->with('info', 'Cliente registrado con exito.!');
    }
    public function edit($id) 
    {
        $custom = Client::where('id', $id)->first();
        return $custom;
    }
    public function update(Request $request, $customer)
    {

        //Client::find($id)->update($request->all());
        $this->validate($request, [
            //'dni' => 'unique:clients,dni,'.$request->dni,
            'dni' => 'required|numeric|unique:clients,dni,' .$customer,
        ]);
        $customer = Client::find($customer);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->dni = $request->dni;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        return; 
    }
    public function destroy($id)
    {
        $customer = Client::findOrFail($id);
        $customer->delete();
    }
    public function getCustomers()
    {
        $customers = Client::all();
        return $customers;
    }
}
