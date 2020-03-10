@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Reportes
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Reportes</a></li>
	      <li class="active">index</li>
	    </ol>
  	</section>
  	<section class="content">
  		<div class="row">
	  		<div class="col-sm-6">
	  			<div class="box box-danger">
	  				<div class="box-header with-border">
	  					Ventas del Dia
	  				</div>
	  				<div class="box-body">
	  					<form action="{{ url('admin/daySales') }}" method="GET">
	  						<div class="form-group col-md-6">
		  						<input type="checkbox" name="type_sell" value="1"><label>Efectivo</label>
	  						</div>
	  						<div class="form-group col-md-6">
		  						<input type="checkbox" name="type_sell" value="2"><label>Transferencia</label>
	  						</div>
	  						<input type="hidden" name="to_day" id="to_day" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
		  					<button type="submit" class="btn btn-default btn-block">
		  						Consultar Ventas del Dia
		  					</button>
	  					</form>
	  				</div>
	  				<div class="box-footer">
	  					<p>
	  						<b>NOTA:</b>&nbsp;para consultar las ventas del día que incluyan las que son por Transferencia y Efectivo solo debe presionar el boton <b>Consultar Ventas del Día,</b> de lo contrario debe seleccionar si quiere Ventas en Efectivo o Ventas por Transferencia.
	  					</p>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-sm-6">
	  			<div class="box box-danger">
	  				<div class="box-header with-border">
	  					Ventas por Fechas
	  				</div>
	  				<div class="box-body">
	  					<form action="{{ url('admin/monthlySales') }}" method="GET">
	  						<div class="form-group col-md-6">
		  						<input type="checkbox" name="type_sell" value="1"><label>Efectivo</label>
	  						</div>
	  						<div class="form-group col-md-6">
		  						<input type="checkbox" name="type_sell" value="2"><label>Transferencia</label>
	  						</div>
	  						<div class="form-group col-md-6">
			                    <label>
			                       	Desde:
			                    </label>
			                    <input type="date" name="start" id="start" class="form-control" value="start">
		                	</div>
		                	<div class="form-group col-md-6">
			                    <label>
			                       	Hasta:
			                    </label>
			                    <input type="date" name="end" id="end" class="form-control" value="end">
		                	</div>
		  					<button type="submit" class="btn btn-default btn-block">
		  						Consultar Ventas
		  					</button>
	  					</form>
	  				</div>
	  				<div class="box-footer">
	  					&nbsp;
	  				</div>
	  			</div>
	  		</div>
	  		<div class="col-sm-6">
	  			<div class="box box-danger">
	  				<div class="box-header with-border">
	  					Prendas Vendidas por Fechas
	  				</div>
	  				<div class="box-body">
	  					<form action="{{ url('admin/monthlySales') }}" method="GET">
	  						<div class="form-group col-md-6">
			                    <label>
			                       	Desde:
			                    </label>
			                    <input type="date" name="start" id="start" class="form-control" value="start">
		                	</div>
		                	<div class="form-group col-md-6">
			                    <label>
			                       	Hasta:
			                    </label>
			                    <input type="date" name="end" id="end" class="form-control" value="end">
		                	</div>
		  					<button type="submit" class="btn btn-default btn-block">
		  						Consultar Ventas
		  					</button>
	  					</form>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
  	</section>
@endsection
