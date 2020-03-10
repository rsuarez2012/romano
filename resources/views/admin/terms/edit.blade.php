<form method="POST"  @submit.prevent="updateTerm(fillTerm.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Editar</h4>
				</div>
				<div class="modal-body">
						<label for="name">Termino</label>
						<input v-model="fillTerm.name" type="text" name="name" class="form-control">
						<span v-if="errors.name" class="error text-danger">@{{ errors.name[0] }}</span>

						<label for="slug">Slug</label>
						<input readonly="" v-model="fillTerm.slug" type="text" name="slug" class="form-control">
						<span v-if="errors.slug" class="error text-danger">@{{ errors.slug[0] }}</span>

						<label for="slug">Slug</label>
						<textarea v-model="fillTerm.description" class="form-control" name="description" ></textarea>
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>