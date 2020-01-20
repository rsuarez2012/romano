@extends('layouts.app')
@section('header')
<h1>
      Complejos Residenciales
      <small>Panel control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Complejos Residenciales</a></li>
      <li class="active">Index</li>
      <li><a href="{{url('complexes/create')}}">Nuevo Complejo</a></li>
    </ol>
@endsection
@section('content')
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Complejos Residenciales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="complexes-tables" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Complejo</th>
                  <th>Dirección</th>
                  <th>Responsable</th>
                  <th>Telefono</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                	@foreach($complexes as $complexe) 
		                <tr>
		                	<td>{{ $complexe->name }}</td>
		                	<td>{{ $complexe->address }}</td>
		                	<td>{{ $complexe->representative }}</td>
		                	<td>{{ $complexe->telephone }}</td>
		                	<td>
		                		<div class="margin" align="center">
		                			<div class="btn-group">
		                				<button class="btn btn-default" type="button">Acción</button>
		                				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					                    <span class="caret"></span>
					                    <span class="sr-only">Toggle Dropdown</span>
					                  </button>
					                  <ul class="dropdown-menu" role="menu">
					                    <li><a href="{{ route('complexes.show', $complexe->id)}}">Ver</a></li>
					                    <li><a href="{{ route('complexes.edit', $complexe->id)}}">Editar</a></li>
					                    <li><a href="{{ route('complexes.destroy', $complexe->id)}}">Eliminar</a></li>
					                  </ul>
		                			</div>
		                		</div>
		                	</td>
		              
		                </tr>
		              @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Complejo</th>
                  <th>Dirección</th>
                  <th>Responsable</th>
                  <th>Telefono</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection