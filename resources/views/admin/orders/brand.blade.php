<form method="POST"  @submit.prevent="" action="{{route('brands.save')}}">
	{{ csrf_field()}}
	<div class="modal fade" id="createBrand">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4>Crear</h4>
				</div>
				<div class="modal-body">
						<label for="brand">Nombre de la Marca</label>
						<input v-model="brand" type="text" name="brand" class="form-control" id="brand">
				</div>
				<div class="modal-footer">
					<input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Guardar">
				</div>
			</div>
		</div>
	</div>
</form>