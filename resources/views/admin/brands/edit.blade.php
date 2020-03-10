<form method="POST"  @submit.prevent="updateBrand(fillBrand.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Editar</h4>
				</div>
				<div class="modal-body">
						<label for="brand">Nombre de la Marca</label>
						<input v-model="fillBrand.brand" type="text" name="brand" class="form-control" id="brand">
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>