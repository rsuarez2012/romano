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
	            <h3>{{ $orders->count() }}</h3>

	            <p>Ordenes</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-bag"></i>
	          </div>
	          <a href="#" class="small-box-footer">Nueva Orden <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-xs-6">
	        <!-- small box -->
	        <div class="small-box bg-green">
	          <div class="inner">
	            <h3>{{ $products->count() }}</h3>

	            <p>Productos</p>
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
	            <h3>{{ $clients->count() }}</h3>

	            <p>Clientes</p>
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
	            <h3>{{ $devolutions->count() }}</h3>

	            <p>Ordenes Canceladas</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-pie-graph"></i>
	          </div>
	          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->

			<div class="col-md-8">
	    	<!-- TABLE: LATEST ORDERS -->
	        	<div class="box box-info">
	            	<div class="box-header with-border">
		              	<h3 class="box-title">Ultimas Ordenes</h3>

		              	<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                	</button>
		                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		            	</div>
	            	</div>
            	<!-- /.box-header -->
	            	<div class="box-body">
	              <div class="table-responsive">
	                <table class="table no-margin">
	                  <thead>
		                  <tr>
		                    <th>Orden ID</th>
		                    <th>Clientes</th>
		                    <th>Estatus</th>
		                    <th>Productos</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	@foreach($orders_lasts as $last)
	                  	<tr>
		                    <td><a href="pages/examples/invoice.html">{{ $last->order_number }}</a></td>
		                    <td>{{ $last->client->client_name }}</td>
		                    <td>
		                    	@if($last->status == 0)
		                    		<span class="label label-danger">{{ $last->status_type }}
		                    		</span>
		                    	@else
									<span class="label label-success">{{ $last->status_type }}</span>
								@endif
		                    </td>
		                    @foreach($last->detailorder as $detail)
		                    <td>
		                      <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $detail->products->name }},
		                      </div>
		                    </td>
		                    @endforeach
		                </tr>
		                @endforeach
	                  </tbody>
	                </table>
	              </div>
	              <!-- /.table-responsive -->
	            	</div>
            	<!-- /.box-body -->
            		<div class="box-footer clearfix">
			            <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nueva Orden</a>
			            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver Todas las Ordenes</a>
            		</div>
            	<!-- /.box-footer -->
          		</div>
          <!-- /.box -->
        	</div>
        <!-- /.col -->
	    	<div class="col-md-4">
          <!-- PRODUCT LIST -->
	          	<div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Ultimos Productos Añadidos</h3>

		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		              </div>
		            </div>
	            <!-- /.box-header -->
	            	<div class="box-body">
	            		@foreach($products_lasts as $productLast)
			            <ul class="products-list product-list-in-box">
			            	<li class="item">
			                  <!--<div class="product-img">
			                    <img src="dist/img/default-50x50.gif" alt="Product Image">
			                  </div>-->
			                  <div class="product-info">
			                    <a href="javascript:void(0)" class="product-title">
			                    	{{ $productLast->name }}
			                      	<span class="label label-success pull-right">
			                      		{{ $productLast->buy }}
			                      	</span>
			                    </a>
			                        <span class="product-description">
			                          Categoria: {{ $productLast->category->category }}
			                        </span>
			                  </div>
			                </li>
			            </ul>
			            @endforeach
	            	</div>
	            <!-- /.box-body -->
	            <div class="box-footer text-center">
	              	<a href="javascript:void(0)" class="uppercase">Ver Todos Los Productos</a>
	            </div>
	            <!-- /.box-footer -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->
	    </div>
	    <!-- /.row -->

  	</section>
@endsection