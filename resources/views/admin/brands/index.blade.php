@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Marcas
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Marcas</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
	    	<div class="col-sm-3" id="form-brand">
	    		<form action="{{ route('brands.save')}}" method="POST"  @submit="getBrand">
	    			{{ csrf_field()}}
		    		<div class="form-group">
		    			<label for="">Agregar Nueva Marca</label>
		    			<input v-on:keyup="prueba" type="text" name="brand" class="form-control" placeholder="Marca" id="brand">
		    			{{--<input v-model="brand" @blur="getBrand" @focus="div_aparecer = false" type="text" name="brand" class="form-control" placeholder="Marca" id="brand"> --}}
		    		</div>
		    		<input :disabled="deshabilitar_boton == 1" type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Guardar">
		    		<br><br>

		    		<!--<button type="submit" class="btn btn-primary btn-xs">Agregar</button>-->
	    		</form>
	    	</div>
	    	<div class="col-sm-9" id="body-brand">
	    		<div class="box box-primary">
	    			<div class="box-header">
	    				<h3 class="box-title"> Listado de Marcas</h3>
	    			</div>
	    			<div class="box-body">
	    				<table class="table table-hover table-sprite" id="category-tables">
	    					<thead>
	    						<tr>
		    						<th>#</th>
		    						<th>Marca</th>
		    						<th>Acciones</th>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						@php
	    							$i = 1;
	    						@endphp
	    						@foreach($brands as $brand)
	    						<tr>
	    							<td>{{ $i++ }}</td>
	    							<td>{{ $brand->brand }}</td>
	    							<td>
	    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editBrand({{$brand->id}})">Editar</a>

	    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteBrand({{$brand->id}})">Eliminar</button>
	    							</td>
	    						</tr>
	    						@endforeach	    						
	    					</tbody>
	    				</table>
	    				@include('admin.brands.edit')
	    			</div>
	    			<div class="box-footer"></div>
	    		</div>
	    	</div>	     
	    </div>
	    <!-- /.row -->
  	</section>
@endsection
