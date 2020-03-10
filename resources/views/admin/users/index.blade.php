@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Usuarios
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Usuarios</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
  		<div id="appUsers">
		    <!-- Small boxes (Stat box) -->
		    <div class="row">
		    	<div class="col-sm-3">
		    		<form method="POST"  @submit="createUser">
		    			{{ csrf_field()}}
			    		<div class="form-group">
			    			<label for="">Nuevo Usuario</label>
			    			<input v-on:keyup="" type="text" name="name" class="form-control" placeholder="Usuario" id="name">
			    			<label for="">Email</label>
			    			<input v-on:keyup="" type="text" name="email" class="form-control" placeholder="Email" id="email">
			    			<label for="">Password</label>
			    			<input v-on:keyup="" type="password" name="password" class="form-control" placeholder="Password" id="password">
			    			
			    		</div>
			    		<input :disabled="deshabilitar_boton == 1" type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Guardar">
			    		<br><br>

		    		</form>
		    	</div>
		    	<div class="col-sm-9">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Usuarios</h3>
		    			</div>
		    			<div class="box-body">
		    				<table class="table table-condensed">
		    					<thead>
		    						<tr>
			    						<th>#</th>
			    						<th>Usuario</th>
			    						<th>Email</th>
			    						<th>Acciones</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<tr v-for="user in users">
		    							<td>@{{ user.id }}</td>
		    							<td>@{{ user.name }}</td>
		    							<td>@{{ user.email }}</td>
		    							<td>
		    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editUser(user.id)">Editar</a>

		    								<button href="#" class="btn btn-danger btn-xs" v-on:click.prevent="deleteUser(user.id)">Eliminar</button>
		    							</td>
		    						</tr>
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
		    				@include('admin.users.edit')
		    			</div>
		    			<div class="box-footer"></div>
		    		</div>
		    	</div>	     
		    </div>
		    <!-- /.row -->
		</div>
  	</section>
@endsection
