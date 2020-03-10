@extends('layouts.appAdminLte')

@section('content')
	<section class="content-header">
	    <h1>
	      Pedidos
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('orders.index')}}"><i class="fa fa-dashboard"></i> Pedidos</a></li>
	      <li class="active">ver</li>
	    </ol>
  	</section>
  	<!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Pedido: #{{ $order[0]->order_number}}.
            <small class="pull-right">Fecha: {{ Carbon\Carbon::now()->format('d/m/Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Datos del cliente
          <address>
            <strong>{{ $order[0]->client->client_name }}.</strong><br>
            Telefono: {{ $order[0]->client->phone }}<br>
            Email: {{ $order[0]->client->email }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong></strong><br>
            <br>
            <br>
            <br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura: #{{ $order[0]->order_number }}</b><br>
          <b>Orden de Registro:</b> {{ $order[0]->id }}<br>
          <b>Fecha de pago:</b> {{ Carbon\Carbon::parse($order[0]->date_order)->format('d/m/Y') }}<br>
          <b>Hora:</b> {{ Carbon\Carbon::parse($order[0]->date_order)->format('H:i')}}

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
              <th>Sku #</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
            </tr>
            </thead>
            <tbody>
            	@php
                    $subtotal = 0;
                    $total = 0;
            	@endphp
           		@foreach($detailorders as $detail)
		            <tr>
		              <td>{{$detail->products->sku}}</td>
		              <td>{{$detail->products->name}}</td>
		              <td>{{$detail->quantity_product}}</td>
		              <td>{{$detail->price}}</td>
		              @php
		              	$subtotal += ($detail->quantity_product*$detail->price);
		              	$total += ($detail->quantity_product*$detail->price);
		              @endphp
		            </tr>
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
	           Gracias por su compra..
          	</p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>${{number_format($subtotal, 2, '.', '')}}</td>
              </tr>
              
              <tr>
                <th>Total:</th>
                <td>${{number_format($total, 2, '.', '') }}</td>
              </tr>
              <tr>
                <th>Forma de Pago:</th>
                <td>@if($order[0]->type_sell == 1)
                        Efectivo
                    @else
                        Transferencia
                    @endif
                </td>
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
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button>
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
    </section>
    <!-- /.content -->   
@endsection