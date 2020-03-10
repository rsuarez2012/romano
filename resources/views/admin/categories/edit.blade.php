<form method="POST"  @submit.prevent="updateCategory(fillCategory.id)">
	{{ csrf_field()}}
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Editar</h4>
				</div>
				<div class="modal-body">
						<label for="category">Categoria</label>
						<input v-model="fillCategory.category" type="text" name="category" class="form-control">
						<span v-if="errors.category" class="error text-danger">@{{ errors.category[0] }}</span>
						<label for="slug">Slug</label>
						<input readonly v-model="fillCategory.slug" type="text" name="slug" class="form-control">
						<span v-if="errors.slug" class="error text-danger">@{{ errors.slug[0] }}</span>
						<label for="description">Descripción</label>
						<input v-model="fillCategory.description" type="text" name="description" class="form-control">
						<span v-if="errors.description" class="error text-danger">@{{ errors.description[0] }}</span>
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
				</div>
			</div>
		</div>
	</div>
</form>