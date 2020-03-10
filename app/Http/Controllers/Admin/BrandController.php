<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Brand;
class BrandController extends Controller
{
    //public function index(User $user)
    public function index(Brand $brand)
    {

    	/*return view('dashboard', [
    		'users' => $user->take(5)->get()
    	]);*/
    	$brands = Brand::all();
    	return view('admin.brands.index', compact('brands'));
    } 
    public function store(Request $request)
    {
    	//dd($request->brand);
    	$brand = new Brand();
    	$brand->brand = $request->brand;
    	$brand->save();

    	return redirect()->route('brands')->with('info', 'Marca registrado con exito.!');
    }
    public function edit($brand)
    {
        $brand = Brand::where('id', $brand)->first();
        return $brand;
    }
    public function update(Request $request, $brand)
    {
        $this->validate($request,[
            'brand' => 'required',
        ]);
        Brand::find($brand)->update($request->all());
        return redirect()->route('brands');
    }

    public function destroy($brand)
    {
        $bran = Brand::where('id', $brand)->first();
        $bran->delete();
        
        
    }
    public function getBrand()
    {
        $brands = Brand::all();

        return $brands;
    }


    public function showBrand($brand)
    {
        $bran = Brand::where("brand", $brand)->count();
        return $bran;
    }
}
