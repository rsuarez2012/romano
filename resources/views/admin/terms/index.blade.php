@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Terminos
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Terminos</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
  		<div id="appTerms">
		    <!-- Small boxes (Stat box) -->
		    <div class="row">
		    	<div class="col-sm-3">
		    		<!--<form method="POST"  @submit="createAttribute">-->
		    		<form action="terms" method="POST">
		    			{{ csrf_field()}}
			    		<div class="form-group">
			    			<label for="">Atributos</label>
			    			<select class="form-control" name="attribute_id" id="attribute_id" v-model="attribute_id">
			    				@foreach($attributes as $attribute)
			    					@if($loop->first)
			    						<option value="{{ $attribute->id }}" selected="selected">{{ $attribute->attribute }}</option>
			    					@else
			    						<option value="{{ $attribute->id }}">{{ $attribute->attribute }}</option>
			    					@endif
			    				@endforeach
			    			</select>
			    			<span v-if="errors.attribute_id" class="error text-danger">@{{ errors.attribute_id[0] }}</span>

			    			<label for="">Termino</label>
			    			<input 
			    				v-model="name"
								@blur="getCategory"
								@focus="div_aparecer=false"
			    			v-on:keyup="" type="text" name="name" class="form-control" placeholder="" id="name">
			    			<span v-if="errors.name" class="error text-danger">@{{ errors.name[0] }}</span><br>

			    			<label for="">Slug</label>
			    			<input readonly="" v-on:keyup="" type="text" name="slug" class="form-control" placeholder="" id="slug" v-model="generarSlug">
			    			<span v-if="errors.slug" class="error text-danger">@{{ errors.slug[0] }}</span>

			    			<label for="">Descripción</label>
			    			<textarea name="description" class="form-control" placeholder="" id="description" v-model="description"></textarea>
			    			<span v-if="errors.description" class="error text-danger">@{{ errors.description[0] }}</span>
			    		</div>
			    		<button class="btn btn-primary btn-xs pull-right" type="submit" v-on:click.prevent="createTerm">Guardar</button>
			    		<br><br>

		    		</form>
		    	</div>
		    	<div class="col-sm-9">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Terminos</h3>
		    			</div>
		    			<div class="box-body">
		    				<table class="table table-condensed" id="category-tables">
		    					<thead>
		    						<tr>
			    						<th>#</th>
			    						<th>Atributo</th>
			    						<th>Nombre</th>
			    						<th>Slug</th>
			    						<th>Descripción</th>
			    						<th>Acciones</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						@foreach($terms as $term)
		    						<tr>
		    							<td>{{ $term->id }}</td>
		    							<td>{{ $term->attribute->attribute }}</td>
		    							<td>{{ $term->name }}</td>
		    							<td>{{ $term->slug }}</td>
		    							<td>{{ $term->description }}</td>
		    							<td>
		    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editTerm({{$term->id}})">Editar</a>

		    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteTerm({{$term->id}})">Eliminar</button>
		    							</td>
		    						</tr>
		    						@endforeach
		    					</tbody>
		    				</table>
		    				<!--Pagination-->
		    				<nav class="pull-right">
		    					<ul class="pagination">
		    						<li v-if="pagination.current_page > 1">
		    							<a href="#" @click.prevent="changePage(pagination.current_page - 1)"><<</a>
		    						</li>

		    						<li v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' : '']">
		    							<a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
		    						</li>

		    						<li v-if="pagination.current_page < pagination.last_page">
		    							<a href="#" @click.prevent="changePage(pagination.current_page + 1)">>></a>
		    						</li>
		    					</ul>
		    				</nav>
		    				<!--end Pagination-->
		    				@include('admin.terms.edit')
		    			</div>
		    			<div class="box-footer"></div>
		    		</div>
		    	</div>	     
		    </div>
		    <!-- /.row -->
		</div>
  	</section>
@endsection
