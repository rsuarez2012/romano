@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Categorias
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Categorias</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row" id="form">
	    	<div class="col-sm-3">
	    		<form action="{{ route('admin.category.store') }}" method="POST">
	    			{{ csrf_field()}}
	    			<h5 class="box-title">Agregar Nueva Categoria</h5>
		    		<div class="form-group">
		    			<label for="">Categoria</label>
		    			<input v-model="category" 
		    				@blur="getCategory" 
		    				@focus="div_aparecer = false" 
		    			type="text" name="category" class="form-control" placeholder=""> 
		    		</div>
		    		<div class="form-group">
		    			<label for="">Slug</label>
		    			<input readonly v-model="generarSlug" type="text" name="slug" class="form-control" placeholder="">

		    			<div v-if="div_aparecer" v-bind:class="div_clase_slug">
		    				@{{ div_mensajeSlug }}
		    			</div> 
						<br v-if="div_aparecer">
		    		</div>
		    		<div class="form-group">
		    			<label for="">Descripción</label>
		    			<textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
		    			
		    		</div>
		    		
		    		<input :disabled="deshabilitar_boton == 1" type="submit" value="Guardar" class="btn btn-primary btn-xs pull-right" name="">
		    		<!--<button type="submit" class="btn btn-primary btn-xs pull-right">Agregar</button>-->
	    		</form>
	    	</div>
	    	<br><br>
	    	<div class="col-sm-9">
	    		<div class="box box-primary">
	    			<div class="box-header">
	    				<h3 class="box-title"> Listado de Categorias</h3>
	    			</div>
	    			<div class="box-body">
	    				<table class="table table-condensed" id="category-tables">
	    					<thead>
	    						<tr>
		    						<th>#</th>
		    						<th>Categoria</th>
		    						<th>Slug</th>
		    						<th>Descripción</th>
		    						<th>Acciones</th>
	    						</tr>
	    					</thead>
	    					<tbody>
	    						@foreach($categories as $category)
	    						<tr>
	    							<td>{{ $category->id }}</td>
	    							<td>{{ $category->category }}</td>
	    							<td>{{ $category->slug }}</td>
	    							<td>{{ $category->description }}</td>
	    							<td>
	    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editCategory({{$category->id}})">Editar</a>

	    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteCategory({{$category->id}})">Eliminar</button>
	    							</td>
	    						</tr>
	    						@endforeach	    						
	    					</tbody>
	    				</table>
	    			</div>
	    			<div class="box-footer"></div>
	    		</div>
	    	</div>	     
	    	
			@include('admin.categories.edit')
	    </div>
	    <!-- /.row -->
  	</section>
@endsection
