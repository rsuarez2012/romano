@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Clientes
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> clientes</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
  		<div id="appCustomers">
  			
		    <!-- Small boxes (Stat box) -->
		    <div class="row">
		    	
	    		<div class="col-sm-12">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Listado de Clientes</h3>
		    				<a href="#" class="btn btn-primary btn-xs pull-right" v-on:click.prevent="open()" type="button">Nuevo Cliente</a>
		    			</div>
		    			<div class="box-body">
		    				<table class="table table-hover table-sprite" id="clients-tables">
		    					<thead>
		    						<tr>
			    						<th>#</th>
			    						<th>Cliente</th>
			    						<th>Dni</th>
			    						<th>Telefono</th>
			    						<th>Email</th>
			    						<th>Acciones</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						@php
		    							$i = 1;
		    						@endphp
		    						@foreach($customers as $customer)
		    						<tr>
		    							<td>{{ $i++ }}</td>
		    							<td>{{ $customer->client_name }}</td>
		    							<td>{{ $customer->dni }}</td>
		    							<td>{{ $customer->phone }}</td>
		    							<td>{{ $customer->email }}</td>
		    							<td>
		    								<a href="#" class="btn btn-primary btn-xs" v-on:click.prevent="editCustomer({{$customer->id}})">Editar</a>
		    								<a href="" class="btn btn-danger btn-xs" v-on:click.prevent="deleteCustomer({{$customer->id}})">Eliminar</a>
		    							</td>
		    						</tr>
		    						@endforeach
		    					</tbody>
		    				</table>
		    			</div>
		    			<div class="box-footer">
		    				
		    			</div>

		    		</div>
	    		</div>	     
		    </div>
		    <!-- /.row -->
		    @include('admin.customers.create')
		    @include('admin.customers.edit')
  		</div>
  	</section>
@endsection