@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Atributos
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Atributos</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
  		<div id="appAttributes">
		    <!-- Small boxes (Stat box) -->
		    <div class="row">
		    	<div class="col-sm-3">
		    		<!--<form method="POST"  @submit="createAttribute">-->
		    		<form action="attributes" method="POST">
		    			{{ csrf_field()}}
			    		<div class="form-group">
			    			<label for="">Nuevo Atributo</label>
			    			<input v-on:keyup="" type="text" name="attribute" class="form-control" placeholder="" id="attribute" v-model="newAttribute"> 
			    			<span v-if="errors.attribute" class="error text-danger">@{{ errors.attribute[0] }}</span>
			    		</div>
			    		<button class="btn btn-primary btn-xs pull-right" type="submit" v-on:click.prevent="createAttribute">Guardar</button>
			    		<br><br>

		    		</form>
		    	</div>
		    	<div class="col-sm-9">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Atributos</h3>
		    			</div>
		    			<div class="box-body">
		    				<table class="table table-condensed">
		    					<thead>
		    						<tr>
			    						<th>#</th>
			    						<th>Atributos</th>
			    						<th>Terminos</th>
			    						<th>Acciones</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr 
		    							
										v-for="attribute in attributes">
		    							<td>@{{ attribute.id }}</td>
		    							<td>@{{ attribute.attribute }}</td>
		    							<td>
											<ul>
												<li 
													v-for="term in attribute.terms">
													@{{term.name}}				
												</li>
											</ul>
		    							
		    								
		    							</td>
		    							<td>
		    								<!--<a href="{{-- route('terms.index') --}}" class="btn btn-xs bg-purple">Terminos</a>-->
		    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editAttribute(attribute.id)">Editar</a>

		    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteAttribute(attribute.id)">Eliminar</button>
		    							</td>
		    						</tr>
		    					</tbody>
		    				</table>
		    				
		    				@include('admin.attributes.edit')
		    			</div>
		    			<div class="box-footer">
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
		    			</div>
		    		</div>
		    	</div>	     
		    </div>
		    <!-- /.row -->
		</div>
  	</section>
@endsection