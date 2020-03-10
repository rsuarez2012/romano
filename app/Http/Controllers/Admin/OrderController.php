<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Client;
use App\Product;
use App\DetailOrder;
use Carbon\Carbon;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::where('stock', '>', 1 )->get();
        $orders = Order::get();
        return view('admin.orders.create', compact('clients', 'products', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'client_id'     => 'required',
        ];
        $messages = [
            'client_id.required' => 'Por favor seleccione el cliente.!',
        ];

        $this->validate($request, $rules, $messages);

        try{
 
            DB::beginTransaction();
            $time = Carbon::now('America/Caracas');
            $order = new Order();
            $order->order_number = $request->order_number;
            $order->client_id = $request->client_id;
            $order->date_order = $time;
            $order->status = '1';
            $order->save();

            

            $product_id = $request->product_id;
            $quantity_product = $request->quantity_product;
            $price = $request->buy;

         
             //Recorro todos los elementos
            $cont=0;

            while($cont < count($product_id)){
                $detail = new DetailOrder();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                /*el id es del registro de la venta*/
                $detail->order_id = $order->id;
                $detail->product_id = $product_id[$cont];
                $detail->quantity_product = $quantity_product[$cont];
                $detail->price = $price[$cont];
                $detail->save();
                $cont=$cont+1;
            }
            
            DB::commit();
 
        } catch(Exception $e){
                 
            DB::rollBack();
        }

        return redirect()->route('orders.index')->with('info', 'Pedido registrado con exito.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->with('detailorder')->get();
        $detailorders = DetailOrder::where('order_id', $id)->get();
        return view('admin.orders.show',compact('order', 'detailorders')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //$order = Order::where('id',$id)->with('detailorder')->get();
        $order = Order::findOrFail($id);
        $order->status = '0';
        $order->save();
        return response()->json($order);
    }
}
