<form method="POST"  @submit.prevent="updateAttribute(fillAttribute.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Editar</h4>
				</div>
				<div class="modal-body">
						<label for="user">Atributo</label>
						<input v-model="fillAttribute.attribute" type="text" name="attribute" class="form-control">
						<span v-if="errors.attribute" class="error text-danger">@{{ errors.attribute[0] }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>