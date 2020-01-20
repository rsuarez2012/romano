@extends('layouts.app')
@section('header')
<h1>
  Complejos Residenciales
  <small>Panel control</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Complejos Residenciales</a></li>
  <li class="active">Crear</li>
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
            <input type="text" class="form-control" placeholder="Complejo" name="name">
          </div>
          <div class="form-group col-xs-4">
            <label>Representate</label>
            <input type="text" class="form-control" placeholder="Responsable del complejo" name="representative">
          </div>
          <div class="form-group col-xs-4">
            <label>Telefono</label>
            <input type="text" class="form-control" placeholder="Telefono del Complejo" name="telephone">
          </div>
          <div class="form-group col-xs-4">
            <label>País</label>
            <input type="text" class="form-control" placeholder="País" name="country">
          </div>
          <div class="form-group col-xs-4">
            <label>Ciudad</label>
            <input type="text" class="form-control" placeholder="Ciudad" name="city">
          </div>
          <div class="form-group col-xs-4">
            <label>Dirección</label>
            <input type="text" class="form-control" placeholder="Dirección del complejo" name="address">
          </div>
          <div class="form-group col-xs-4">
            <label>Tipo de Complejo</label>
            <select name="complexe_type" class="form-control">
								<option value="1">Casas</option>
								<option value="2">Apartamentos</option>
								<option value="3">Mixto</option>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de Viviendas</label>
            <input type="text" class="form-control" placeholder="Numero de viviendas en el complejo" name="number_houses">
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de entradas</label>
            <input type="text" class="form-control" placeholder="Entradas al complejo" name="number_in">
          </div>
          <div class="form-group col-xs-4">
            <label>Numero de Salidas</label>
            <input type="text" class="form-control" placeholder="Salidas del complejo" name="number_out">
          </div>
          <div class="form-group col-xs-4">
          	&nbsp;
          </div>
          <div class="form-group col-xs-4">
          	&nbsp;
          </div>
	        <div class="form-group col-xs-12">
		        <center>
		          <label>Logo del complejo</label>
		            <div id="preview"></div>
		                    <!--<img src="{{--asset('storage/original/'.$paquete->imagen)--}}" alt="" width="450" height="200">-->
		        </center>
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
         	<input type="checkbox" class="flat-red" name="motorcycles_parking" value="1">
        </div>
	      <div class="form-group col-xs-6">
	        <label>Cantidad de Puestos Motos</label>
	        <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="motorcycles_places">
	      </div>
        <div class="form-group col-xs-6">
          <label>Parqueadero de Bicicletas</label><br>
          <input type="checkbox" name="bikes_parking" value="1">
        </div>
	      <div class="form-group col-xs-6">
	        <label>Cantidad de Puestos Bicis</label>
	        <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="bikes_places">
	      </div>
	      <div class="form-group col-xs-6">
	        <label>Parqueadero de Autos</label><br>
	        <input type="checkbox" name="cars_parking" value="1">
	      </div>
	      <div class="form-group col-xs-6">
	        <label>Cantidad de Puestos</label>
	        <input type="text" class="form-control" placeholder="Puestos del parqueadero" name="cars_places">
	      </div>
	      <div class="form-group col-xs-12">
	      	<label>Logo</label>
	        <!--<input type="file" class="form-control" placeholder="Logo del complejo" name="logo">-->
	        <input class="form-control" @change="processFile($event)" type="file" accept="image/*" id="file" name="logo">
	      </div>
	      <hr>
	      <button type="submit" class="btn btn-sm btn-info col-xs-12"><i class="fa fa-plus"></i>Registrar</button>
	    </div>
  	</div>
  </div>
  	
  </form>
</div>

@endsection
@section('script')
<script type="text/javascript">
/*$(document).ready(function(){
	alert("hola");
	$("#file").change(function () {
    filePreview(this);
  });
  
  function filePreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        //$('#uploadForm + img').remove();
        $('#preview').after('<img src="'+e.target.result+'" width="450" height="200"/>');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
});*/
</script>
@endsection