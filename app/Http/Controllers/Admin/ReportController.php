<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index');
    }

    public function daySales(Request $request)
    {
        $type_sell = $request->type_sell;
        $date_sell = $request->to_day;
        if(is_null($type_sell)){
            $sells = Order::whereDate('date_order', $date_sell)->with('detailorder')->get();
        }else{
            $sells = Order::whereDate('date_order', $date_sell)->where('type_sell', $type_sell)->with('detailorder')->get();
        }
        return view('admin.reports.sell_for_day', compact('sells', 'date_sell'));
    }
    public function monthlySales(Request $request)
    {
        $type_sell = $request->type_sell;
        $start = $request->start;
        $end = $request->end;
        if(is_null($type_sell)){
            $sales = Order::whereBetween('date_order', [$start, $end])->with('detailorder')->get();
        }else{
            $sales = Order::whereBetween('date_order', [$start, $end])->where('type_sell', $type_sell)->with('detailorder')->get();
        }
        return view('admin.reports.monthly_sales', compact('sales', 'start', 'end'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
