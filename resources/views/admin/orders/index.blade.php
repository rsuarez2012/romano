@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Pedidos
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Pedidos</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row" id="appOrders">
	    	<div class="col-sm-12">
	    		<div class="box box-primary">
	    			<div class="box-header">
	    				<h3 class="box-title"> Listado de Pedidos</h3>
	    				<a href="{{route('orders.create')}}" class="btn btn-primary btn-xs pull-right" type="button">Nuevo Pedido</a>
	    			</div>
	    			<div class="box-body">
	    				<table class="table table-responsive table-condensed table-striped" id="category-tables">
	    					<thead>
	    						<tr>
		    						<th style="text-align: center;">#</th>
		    						<th style="text-align: center;">Pedido Numero</th>
		    						<th style="text-align: center;">Fecha de Emisión</th>
		    						<th style="text-align: center;">Cliente</th>
		    						<th style="text-align: center;">Estatus</th>
		    						<th style="text-align: center;">Acciones</th>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						@php
	    							$i = 1;
	    						@endphp
	    						
	    						@foreach($orders as $order)
	    						<tr>
	    							<td style="text-align: center;">{{ $i++ }}</td>
	    							<td style="text-align: center;">{{ $order->order_number }}</td>
	    							<td style="text-align: center;">{{ $order->date_order }}</td>
	    							<td style="text-align: center;">{{ $order->client->client_name }}</td>
	    							<td style="text-align: center;">
	    								@if($order->status == 0)
	    									<span class="label label-danger">{{ $order->status_type }}</span>
	    								@else
	    									<span class="label label-success">{{ $order->status_type }}</span>
	    								@endif
	    							</td>
	    							<td>
	    								<a href="{{route('orders.show', $order->id)}}" class="btn bg-purple btn-xs">Ver</a>
	    								<!--<a href="{{--route('orders.edit', $order->id)--}}" class="btn btn-primary btn-xs">Editar</a>-->
	    								@if($order->status == '1')
	    									<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteOrder({{$order->id}})">Cancelar</button>
	                                        
	                                    @else
	                                    	<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteOrder({{$order->id}})" disabled>Cancelar</button>
	                                       
	                                    @endif
	    								
	    							</td>
	    						</tr>
	    						@endforeach
	    					</tbody>
	    				</table>
	    			</div>
	    			<div class="box-footer"></div>
	    		</div>
	    	</div>	     
	    </div>
	    <!-- /.row -->
  	</section>
@endsection
