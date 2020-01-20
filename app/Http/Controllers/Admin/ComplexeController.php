<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Complexe;

class ComplexeController extends Controller
{
    public function index()
    {
        $complexes = Complexe::all();
        
        return view('admin.complexes.index', compact('complexes'));
    }

    public function create()
    {  
        $area = null;
        
        return view('admin.complexes.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $complejo = Complexe::create($request->all());
        //return;
        return redirect()->route('complexes.index')->with('info', 'Complejo residencial Almacenado con exito.!');
        

    }

    public function show($id)
    {
        //$id = Crypt::decrypt($id);
        $complexe = Complexe::findOrFail($id);
        return view('admin.complexes.show')->with(compact('complexe'));
    }


    public function edit($id)
    {
    	//$id = Crypt::decrypt($id);
    	$complexe = Complexe::findOrFail($id);
        return view('admin.complexes.edit')->with(compact('complexe'));
    }

    /*public function update(AreaUpdateRequest $request)
    {
    	$area = Area::findOrFail($request->input('id'));
    	$area->fill($request->all())->save();
		return redirect()->action('Bcknd\AreaController@index')->with('info', 'Tipo de legalización actualizada con exito!');    

    }

    public function delete($id = null)
    {

        $id = Crypt::decrypt($id);
        $area = Area::findOrFail($id);
        $area->delete();
        return redirect()->action('Bcknd\AreaController@index')->with('info', 'Tipo de legalización eliminado con exito!');
    }*/
}
