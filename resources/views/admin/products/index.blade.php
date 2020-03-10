@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Productos
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row" id="appProducts">
	    	<div class="col-sm-12">
	    		<div class="box box-primary">
	    			<div class="box-header">
	    				<h3 class="box-title"> Listado de Productos</h3>
	    				<a href="{{route('products.create')}}" class="btn btn-primary btn-xs pull-right" type="button">Nuevo Producto</a>
	    			</div>
	    			<div class="box-body">
	    				<table class="table table-condensed" id="category-tables">
	    					<thead>
	    						<tr>
		    						<th>#</th>
		    						<th>Nombre</th>
		    						<th>Marca</th>
		    						<th>Sku</th>
		    						<th>Categoria</th>
		    						<th>Precio</th>
		    						<th>Color</th>
		    						<th>Talla</th>
		    						<th>Stock</th>
		    						<th>Estatus</th>
		    						<th>Acciones</th>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						@php
	    							$i = 1;
	    						@endphp
	    						
	    						@foreach($products as $product)
	    						<tr>
	    							<td>{{ $i++ }}</td>
	    							<td>{{ $product->name }}</td>
	    							<td>{{ $product->brand->brand }}</td>
	    							<td>{{ $product->sku }}</td>
	    							<td>{{ $product->category->category }}</td>
	    							<td>{{ $product->buy }}</td>
	    							<td>{{ $product->term->name }}</td>
	    							<td>{{ $product->termSize->name }}</td>
	    							<td>{{ $product->stock }}</td>
	    							<td>{{ $product->status }}</td>
	    							<td>
	    								<a href="#" class="btn bg-purple btn-xs" v-on:click.prevent="openModal({{$product->id}})">Cargar</a>
	    								<a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-xs">Editar</a>
	    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteProduct({{$product->id}})">Eliminar</button>
	    								
	    							</td>
	    						</tr>
	    						@endforeach
	    					</tbody>
	    				</table>
	    				 @include('admin.products.upload')
	    			</div>
	    			<div class="box-footer"></div>
	    		</div>
	    	</div>	     
	    </div>
	    <!-- /.row -->
  	</section>
@endsection
