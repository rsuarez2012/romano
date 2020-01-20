@extends('layouts.app')
@section('header')
<h1>
  Complejos Residenciales
  <small>Panel control</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{route('complexes.index')}}"><i class="fa fa-dashboard"></i> Complejos Residenciales</a></li>
  <li class="active">Editar</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-7">
		<div class="box box-success">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Detalles del Complejo Residencial</h3>
      </div>
      <div class="box-body">
        <form action="{{Route('complexes.store')}}" method="POST">
          {!! csrf_field() !!}
              <!-- text input -->
          <div class="form-group col-xs-4">
            <label>Conjunto Residencial</label>
            <input type="text" class="form-control" placeholder="Complejo" name="name" value="{{ $complexe->name }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Representate</label>
            <input type="text" class="form-control" placeholder="Responsable del complejo" name="representative" value="{{ $complexe->representative }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Telefono</label>
            <input type="text" class="form-control" placeholder="Telefono del Complejo" name="telephone" value="{{ $complexe->telephone }}">
          </div>
          <div class="form-group col-xs-4">
            <label>P
            aís</label>
            <input type="text" class="form-control" placeholder="País" name="country" value="{{ $complexe->country }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Ciudad</label>
            <input type="text" class="form-control" placeholder="Ciudad" name="city" value="{{ $complexe->city }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Dirección</label>
            <input type="text" class="form-control" placeholder="Dirección del complejo" name="address" value="{{ $complexe->address }}" >
          </div>
          <div class="form-group col-xs-4">
            <label>Tipo de Complejo</label>
            <select name="complexe_type" class="form-control">
                <option value="1" {{$complexe->complexe_type == '1' ? 'selected' : ''}}>Casas</option>
                <option value="2" {{$complexe->complexe_type == '2' ? 'selected' : ''}}>Apartamentos</option>
                <option value="3" {{$complexe->complexe_type == '3' ? 'selected' : ''}}>Mixto</option>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de Viviendas</label>
            <input type="text" class="form-control" placeholder="Numero de viviendas en el complejo" name="number_houses" value="{{ $complexe->number_houses }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de entradas</label>
            <input type="text" class="form-control" placeholder="Entradas al complejo" name="number_in" value="{{ $complexe->number_in }}">
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de Salidas</label>
            <input type="text" class="form-control" placeholder="Salidas del complejo" name="number_out" value="{{ $complexe->number_out }}">
          </div>
      </div>    
    </div>
  </div>
  <div class="col-md-5">
  	<div class="box box-success">
  		<div class="box-header">
		    <i class="fa fa-comments-o"></i>
		    <h3 class="box-title">Detalles Extras del Complejo Residencial</h3>
		  </div>
		  <div class="box-body">
        <div class="form-group col-xs-6">             
          <label>
              Parqueadero de Motos
          </label><br>
          <input type="checkbox" class="flat-red" name="motorcycles_parking" value="1" {{$complexe->motorcycles_parking == '1' ? 'checked' : ''}}>
        </div>
        <div class="form-group col-xs-6">
          <label>Cantidad de Puestos Motos</label>
          <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="motorcycles_places" value="{{ $complexe->motorcycles_places }}">
        </div>
        <div class="form-group col-xs-6">
          <label>Parqueadero de Bicicletas</label><br>
          <input type="checkbox" name="bikes_parking" value="1" {{$complexe->bikes_parking == '1' ? 'checked' : ''}}>
        </div>
        <div class="form-group col-xs-6">
          <label>Cantidad de Puestos Bicis</label>
          <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="bikes_places" value="{{ $complexe->bikes_places }}">
        </div>
        <div class="form-group col-xs-6">
          <label>Parqueadero de Autos</label><br>
          <input type="checkbox" name="cars_parking" value="1" {{$complexe->cars_parking == '1' ? 'checked' : ''}}>
        </div>
        <div class="form-group col-xs-6">
          <label>Cantidad de Puestos</label>
          <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="cars_places" value="{{ $complexe->cars_places }}">
        </div>
        <div class="form-group col-xs-12">
          <label>Logo</label>
          <input type="file" class="form-control" placeholder="Logo del complejo" name="logo">
        </div>
	      <button type="submit" class="btn btn-sm btn-info col-xs-12"><i class="fa fa-plus"></i>Actualizar</button>
	    </div>
  	</div>
  </div>
  	
  </form>
</div>

@endsection