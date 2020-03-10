@extends('layouts.appAdminLte')

@section('content')
	<section class="content-header">
	    <h1>
	      Nuevo Pedido
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('orders.index')}}"><i class="fa fa-dashboard"></i> Pedidos</a></li>
	      <li class="active">crear</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row" id="appOrders">
	    	<form method="POST" action="{{route('orders.store')}}">
	    		{{ csrf_field() }}

		    	<div class="col-sm-3">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Detalles de pedido</h3>			
		    			</div>
		    			<div class="box-body">
				    		<div class="form-group">
		    					<label>Numero de Pedido:</label>
		    					<!--<input type="number" name="order_number" id="order_number" value="{{-- !empty($orders->order_number) ? $orders->order_number: '1' --}}">-->
		    					@if(empty($orders->last()->order_number))
		    						<input name="order_number" type="hidden" id="order_number" value="{{ str_pad (1, 5, '0', STR_PAD_LEFT) }}">
					    			{{ str_pad (1, 5, '0', STR_PAD_LEFT) }}
					    		@else
						    		<input name="order_number" type="hidden" id="order_number" value="{{ str_pad ($orders->last()->order_number + 1, 5, '0', STR_PAD_LEFT) }}">
					    			{{ str_pad ($orders->last()->order_number + 1, 5, '0', STR_PAD_LEFT) }}
					    		@endif
		    					{{-- str_pad (!empty($orders->order_number) ? $orders->order_number + 1: '1', 7, '0', STR_PAD_LEFT) --}}
				    		</div>
		    				<div class="form-group">
		    					
	                          		<label>Fecha:</label> {{ Carbon\Carbon::now()->format('d/m/Y')}}
	                          		<br>
									<label>Hora:</label> {{ Carbon\Carbon::now()->format('H:i')}}
		    					
				    		</div>
		    			</div>
		    			<div class="box-footer">
		    				<label>Forma de Pago</label>
		    				<select class="form-control">
		    					<option value="1">Efectivo</option>
		    					<option value="2">Transferencia</option>
		    				</select>
		    			</div>
		    		</div>

		    	</div>
		    	<div class="col-sm-9" id="">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Pedido</h3>			
		    			</div>
		    			<div class="box-body">
		    				<div class="form-group">
				    			<label>Cliente</label>
				    			<select class="form-control select2" name="client_id">
				    				<option selected value="">Seleccione el cliente</option>
				    				@foreach($clients as $client)
				    					<option value="{{ $client->id }}">{{ $client->client_name }}</option>
				    				@endforeach
				    			</select>
				    		</div>
				    		<div class="form-group">
				    			<label>Productos</label>
				    			<select class="form-control select2" id="selectProduct" style="border-radius: 0;
box-shadow: none;border-color: #d2d6de;display: block;width: 100%;height: 34px;
    padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;">
				    				<option selected="" value="">Seleccione el producto</option>
				    				@foreach($products as $product)
				    					<option value="{{$product->id}}_{{$product->buy}}_{{$product->stock}}_{{$product->sku}}_{{$product->name}}">{{$product->name}}</option>
				    				@endforeach	
				    			</select>
				    		</div>
				    		<div class="form-group">
				    			<label>Detalles del Producto </label>
				    			<br>
				    			<span class="col-sm-4">
					    			<input type="text" name="name" value="" disabled="" class="form-control" placeholder="Producto" id="product">

					    			<!--<input type="hidden" name="id" id="product_id">-->
			                        <input type="hidden" name="product_id" id="product_id">

					    			<input type="hidden" name="sku" id="sku">
					    			<input type="hidden" name="prod" id="prod">
					    			<!--<input type="hidden" name="buy[]" id="buy">-->
				    			</span>
				    			<span class="col-sm-4">
					    			<input type="text" name="stock" value="" disabled="" class="form-control" placeholder="Stock" id="stock">
				    			</span>
				    			<span class="col-sm-4">
					    			<input type="text" name="buy" value="" disabled="" class="form-control" placeholder="Precio" id="buy">
				    			</span>
				    		</div>
				    		<div class="form-group">
				    			<span class="col-sm-8">
				    				<br>
				    				<input type="text" name="" placeholder="Cantidad a vender" class="form-control" id="quantity">
				    			</span>
				    			<span class="col-sm-4">
				    				<br>
				    				 <button type="button" id="add" class="btn bg-purple pull-right"><i class="fa fa-plus"></i> Agregar detalle</button>
				    			</span>
				    		</div>
		    			</div>
		    		</div>

		    	</div>

		    	<div class="col-sm-3">
		    		

		    	</div>
		    	<div class="col-sm-9">
		    		<div class="box">
		    			<div class="box-header">
		    				<h3 class="box-title"> Detalles</h3>			
		    			</div>
		    			<div class="box-body">
				    		<table class="table-striped" id="details" style="width: 100%; border: 1px;">
			                    <thead>
			                      <tr style=" background-color: #eee; font-size: 15px;">
			                        <th style="text-align: center;">Codigo</th>
			                        <th style="text-align: center;">Producto</th>
			                        <th style="text-align: center;">Cantidad</th>
			                        <th style="text-align: center;">Precio</th>
			                        <th style="text-align: center;">Eliminar</th>
			                        <!--<th style="text-align: center;  border-top-right-radius: 20px;">Total</th>-->
			                      </tr>
			                    </thead>
			                    <tbody>
			                     
			                    </tbody>
			                 </table>
		    			</div>
		    			<div class="box-footer">
		    				<h3 class="box-title"> Total a Cancelar</h3>
		    				<div class="table-responsive pull-right col-sm-5">
		    					<table class="table">
		    						<tbody>
		    							<tr>
		    								<th>Sub-Total:</th>
		    								<td id="sub-total">$ 0.00</td>
		    							</tr>
		    							<tr>
		    								<th>Total:</th>
		    								<td id="total_sell">$ 0.00</td>
		    							</tr>
		    						</tbody>
		    					</table>
		    				<button class="btn pull-right" id="guardar">Registrar Pedido</button>
		    				</div>
		    			</div>
		    		</div>

		    	</div>
		    </form>	     
	    </div>
	    <!-- /.row -->
	    {{--@include('admin.orders.brand')--}}
  	</section>
@endsection
@section('script')
	<script type="text/javascript">
		function eliminar(index){
			
			total_pagar = total - subTotal[index];
			$('#sub-total').html('$. ' + total_pagar.toFixed(2));
			$('#total_sell').html('$. ' + total_pagar.toFixed(2));
			$("#fila" + index).remove();
			evaluar();
     	}
	</script>
@endsection