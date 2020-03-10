@extends('layouts.appAdminLte')

@section('content')
	<section class="content-header">
	    <h1>
	      Reportes
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{url('admin/reports')}}"><i class="fa fa-dashboard"></i> Reportes</a></li>
	      <li class="active">ver</li>
	    </ol>
  	</section>
  	<!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Reporte desde el día: {{ Carbon\Carbon::parse($start)->format('d/m/Y') }} hasta el día {{ Carbon\Carbon::parse($end)->format('d/m/Y') }}
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">Numero de Venta</th>
              <th>Sku #</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Forma de Pago</th>
            </tr>
            </thead>
            <tbody>
            	@php
                    $subtotal = 0;
                    $total = 0;
                    $products = 0;
            	@endphp
           		@foreach($sales as $sell)
		            <tr>
			            <td style="text-align: center;" rowspan="{{$sell->detailorder->count()}}">{{str_pad ($sell->order_number, 7, '0', STR_PAD_LEFT)  }}
           			@foreach($sell->detailorder as $order)
		              <td>{{$order->products->sku}}</td>
		              <td>{{$order->products->name}}</td>
		              <td>{{$order->quantity_product}}</td>
		              <td>{{$order->price}}</td>
		              <td>
		              	@if($sell->type_sell == 2)
		              		Transferencia
		              	@else
		              		Efectivo
		              	@endif
		              </td>
		              @php
		              	$subtotal += ($order->quantity_product*$order->price);
		              	$total += ($order->quantity_product*$order->price);
                    $products += $order->quantity_product;
		              @endphp
		            </tr>
		            @endforeach
            	@endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
	           Reporte de Ventas por fechas.
          	</p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total de prendas vendidas:</th>
                <td>{{$products}}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>${{number_format($total, 2, '.', '') }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!--<a href="{{--url('admin/sellToDay')--}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>-->
        </div>
      </div>
    </section>
    <!-- /.content -->   
@endsection