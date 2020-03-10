<form method="POST"  @submit.prevent="updateUser(fillUser.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Editar</h4>
				</div>
				<div class="modal-body">
						<label for="user">Nombre de Usuario</label>
						<input v-model="fillUser.name" type="text" name="user" class="form-control" id="user">
						<label for="user">Email del Usuario</label>
						<input v-model="fillUser.email" type="text" name="user" class="form-control" id="user">
						<label for="user">Password del Usuario</label>
						<input v-model="fillUser.password" type="password" name="user" class="form-control" id="user">
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>