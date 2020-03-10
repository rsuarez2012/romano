<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attribute;
use App\Brand;
use App\Category;
use App\Product;
use App\ProductWarehouse;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::with('terms')->get();
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::all();
        return view('admin.products.create', compact('brands', 'categories', 'attributes', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'brand_id'      => 'required',
            'size_id'       => 'required',
            'color_id'      => 'required',
            'sku'           => 'required',
            'category_id'   => 'required',
            'buy'           => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->size_id = $request->size_id;
        $product->color_id = $request->color_id;
        $product->sku = $request->sku;
        $product->stock = 0;
        $product->condition = 0;
        $product->category_id = $request->category_id;
        $product->buy = $request->buy;
        $product->save();

        return redirect()->route('products.index')->with('info', 'Producto almacenado con exito.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributes = Attribute::with('terms')->get();
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::all();
        $productt = Product::find($id);
        return view('admin.products.edit', compact('productt', 'product', 'brands', 'categories', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'brand_id'      => 'required',
            'size_id'       => 'required',
            'color_id'      => 'required',
            'sku'           => 'required',
            'category_id'   => 'required',
            'buy'           => 'required'
        ]);
        Product::find($id)->update($request->all());
        return redirect()->route('products.index')->with('info', 'Producto editado con exito.!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->stock > 1)
            return 1;
        else
            $product->delete();
        return 0;
    }
    public function up($id)
    {
        $productt = Product::find($id);
        return response()->json($productt);
    }
    public function upload(Request $request, $id)
    {
        $productUp = new ProductWarehouse();
        $productUp->product_id = $request->id;
        $productUp->quantity_in = $request->quantity_in;
        $productUp->upload_date = $request->upload_date;
        $productUp->save();

        $product = Product::find($request->id);
        if($product->condition == 0)
            $product->condition = 1;
        $product->save();
        return response()->json($productUp);
    }
}
