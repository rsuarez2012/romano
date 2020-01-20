@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Dashboard
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li class="active">Dashboard</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
	      <div class="col-lg-3 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-aqua">
	          <div class="inner">
	            <h3>150</h3>

	            <p>New Orders</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-bag"></i>
	          </div>
	          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-green">
	          <div class="inner">
	            <h3>53<sup style="font-size: 20px">%</sup></h3>

	            <p>Bounce Rate</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-stats-bars"></i>
	          </div>
	          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-yellow">
	          <div class="inner">
	            <h3>44</h3>

	            <p>User Registrations</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-person-add"></i>
	          </div>
	          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-red">
	          <div class="inner">
	            <h3>65</h3>

	            <p>Unique Visitors</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-pie-graph"></i>
	          </div>
	          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	    <div class="col-sm-7">
	  	<ul class="list-group">
	  	@foreach($users as $user)
	  		<li class="list-group-item">
	  			<h4>{{ $user->name }}</h4>
	  			<em>ultimo ingreso: ----</em>
	  		</li>
	  	@endforeach
	  </ul>
  	</div>
	    </div>
	    <!-- /.row -->
  	</section>
  	
  <!--<div class="col-sm-7">
			<!--<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva tarea</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						
						<th>id</th>
						<th>Tarea</th>
						<th colspan="2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="keep in keeps">
						<td width="10px">@{{keep.id}}</td>
						<td>@{{keep.keep }}</td>
						<td width="10px">
							<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)" v-on:click.prevent="editKeep(keep)">Editar</a>
						</td>
						<td width="10px">
							<a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>
			<nav>
				<ul class="pagination">
					<li v-if="pagination.current_page > 1">
						<a href="#" @click.prevent="changePage(pagination.current_page - 1)">
							<span>Atras</span>
						</a>
					</li>
					
					<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
						<a href="#" @click.prevent="changePage(page)">
							@{{ page }}
						</a>
					</li>
					
					<li v-if="pagination.current_page < pagination.last_page">
						<a href="#" @click.prevent="changePage(pagination.current_page + 1)">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>
			</nav>
			@include('create')
			@include('edit')
		</div>
		<div class="col-sm-5">
			<pre>
				@{{ $data }}
			</pre>
		</div>-->
	</div>
</div>
@endsection