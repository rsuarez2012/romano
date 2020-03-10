<form action="{{route('customers.store')}}" method="POST">
	{{ csrf_field()}}
	<div class="modal fade" id="create_client">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>				
	    			<h4 class="box-title">Nuevo Cliente</h4>
				</div>
				<div class="modal-body">
	    			<label for="">Nombre</label>
	    			<input type="text" name="first_name" class="form-control" v-model="newCustomer.first_name">
					<span class="text-danger"></span> 

	    			<label for="">Apellido</label>
	    			<input type="text" name="last_name" class="form-control" placeholder="" v-model="newCustomer.last_name">

	    			<label for="">Dni</label>
	    			<input type="text" name="dni" class="form-control" placeholder="" v-model="newCustomer.dni"> 

	    			<label for="">Telefono</label>
	    			<input type="text" name="phone" class="form-control" placeholder="" v-model="newCustomer.phone"> 
	    			
	    			<label for="">Email</label>
	    			<input type="email" name="email" class="form-control" placeholder="" v-model="newCustomer.email"> 
				</div>
				<div class="modal-footer">
		    		<input type="submit" class="btn btn-primary btn-xs" value="Guardar">
				</div>
			</div>
		</div>
	</div>
</form>
