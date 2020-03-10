<form method="POST"  @submit.prevent="updateCustomer(fillCustomer.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit_client">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>				
	    			<h4 class="box-title">Editar</h4>
				</div>
				<div class="modal-body">

	    			<label for="">Nombre</label>
	    			<input type="text" name="first_name" class="form-control" placeholder="" v-model="fillCustomer.first_name">
					 
	    			<label for="">Apellido</label>
	    			<input type="text" name="last_name" class="form-control" placeholder="" v-model="fillCustomer.last_name"> 
	    			<label for="">Dni</label>
	    			<input type="text" name="dni" class="form-control" placeholder="" v-model="fillCustomer.dni"> 
	    			<label for="">Telefono</label>
	    			<input type="text" name="phone" class="form-control" placeholder="" v-model="fillCustomer.phone"> 
	    			<label for="">Email</label>
	    			<input type="text" name="email" class="form-control" placeholder="" v-model="fillCustomer.email"> 
				</div>
				<div class="modal-footer">
		    		<input type="submit" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>
