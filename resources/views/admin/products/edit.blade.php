@extends('layouts.appAdminLte')
@section('content')
	<section class="content-header">
	    <h1>
	      Editar Producto
	      <small>Panel control</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{route('products.index')}}"><i class="fa fa-dashboard"></i> Productos</a></li>
	      <li class="active">editar</li>
	    </ol>
  	</section>
  	<section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row" id="appProducts">
	    	<form method="POST" action="{{route('products.update', $productt->id)}}">
	    		{{ csrf_field() }}
	    		{{ method_field('patch') }}
		    	<div class="col-sm-8" id="body-brand">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title"> Producto</h3>			
		    			</div>
		    			<div class="box-body">
		    				<div class="form-group">
				    			<label>Nombre</label>
				    			<input class="form-control" name="name" value="{{$productt->name}}">
				    		</div>
		    			</div>
		    		</div>

		    	</div>
		    	<div class="col-sm-4">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title">Gestion de Marcas</h3>			
		    			</div>
		    			<div class="box-body">
		    				<div class="form-group">
				    			<label>Marcas</label>
				    			<!--<a href="#" class="pull-right" v-on:click="openBrand()">Nueva Marca</a>-->
				    			<select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la Marca" style="width: 100%;" name="brand_id">
				    				@foreach($brands as $brand)
				    					<option value="{{$brand->id}}" {{ $productt->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand }}</option>
				    				@endforeach
				    			</select>
				    			</ul>
				    		</div>
		    			</div>
		    		</div>
		    	</div>
		    	<div class="col-sm-8">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title">Gestion de Atributos</h3>			
		    			</div>
		    			<div class="box-body">		    				
				    		<div class="form-group">
				    			<label>Precio</label>
				    			<input class="form-control" name="buy" type="number" value="{{ $productt->buy }}">
				    		</div>
		    				<div class="form-group">		    					
			    				<label>
			    					@if($attributes[0]->id == 1)
			    						{{ $attributes[0]->attribute }}
			    					@endif
			    				</label>
			    				<br>
								<select id="" class="select2" multiple="multiple" name="size_id" style="border-radius: 0;
box-shadow: none;border-color: #d2d6de;display: block;width: 100%;height: 34px;
    padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;">
									@foreach($attributes as $attribute)
										@foreach($attribute->terms as $term)	
											@if($term->attribute_id == 1)
												<option value="{{ $term->id }}"{{ $productt->size_id == $term->id ? 'selected' : '' }}>{{$term->name}}</option>
											@endif
										@endforeach
									@endforeach
								</select>
		    				</div>
							<div class="form-group">
			    				<label>
			    					@if($attributes[1]->id == 2)
			    						{{ $attributes[1]->attribute }}
			    					@endif
			    				</label>
			    				<select id="" class="select2" multiple="multiple" name="color_id" style="border-radius: 0;
box-shadow: none;border-color: #d2d6de;display: block;width: 100%;height: 34px;
    padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;">
			    					@foreach($attributes as $attribute)
										@foreach($attribute->terms as $term)	
											@if($term->attribute_id == 2)
												<option value="{{ $term->id }}" {{ $productt->color_id == $term->id ? 'selected' : '' }}>{{$term->name}}</option>
											@endif
										@endforeach
									@endforeach
			    				</select>
								</div>
				    		<div class="box-header">
			    				<h3 class="box-title">Gestion de Inventario</h3>			
			    			</div>
			    			<div class="form-group">
				    			<label>Sku</label>
				    			<input readonly class="form-control" name="sku" type="number" value="{{ str_pad ($product->last()->sku + 1, 6, '0', STR_PAD_LEFT) }}">
				    		</div>
				    		
				    		<div class="form-group">
				    			<label>Cantidad en Stock</label>
				    			<input readonly="" class="form-control" name="stock" type="number" value="{{ $productt->stock }}">
				    		</div>
				    		<div class="form-group">
				    			<label>Estado del Producto</label>
								<select class="form-control" name="condition">
									<option value="1" {{ $productt->condition == 1 ? 'selected' : '' }}>Activo</option>
									<option value="0"{{ $productt->condition == 0 ? 'selected' : ''}}>Agotado</option>
								</select>
				    		</div>
		    			</div>
		    		</div>

		    	</div>
		    	<div class="col-sm-4">
		    		<div class="box box-primary">
		    			<div class="box-header">
		    				<h3 class="box-title">Gestion de Categorias</h3>			
		    			</div>
		    			<div class="box-body">
		    				<div class="form-group">
				    			<label>Categorias</label>
				    			<!--<a href="#" class="pull-right">Nueva Categoria</a>-->
				    			<select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la Categoria" style="width: 100%;" name="category_id">
				    				@foreach($categories as $category)
					    				<option value="{{ $category->id }}" {{ $productt->category_id == $category->id ? 'selected' : '' }}>{{$category->category}}</option>
					    			@endforeach
				    			</select>				    			
				    		</div>
		    			</div>
		    			<div class="box-footer">
		    				<button class="btn btn-primary btn-xs pull-right" type="submit">Actualizar</button>
		    			</div>
		    		</div>
		    	</div>
		    </form>	     
	    </div>
	    <!-- /.row -->
	    {{--@include('admin.products.brand')--}}
  	</section>
@endsection
