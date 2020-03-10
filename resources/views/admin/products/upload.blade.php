<form method="POST"  @submit.prevent="updateStock(fillProduct.id)">
  {{ csrf_field()}}
  <div class="modal fade" id="uploadStock">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">&times;</button>
          <h4>Cargar inventario</h4>
        </div>
        <div class="modal-body">
            <label for="sku">Sku</label>
            <input readonly="" v-model="fillProduct.sku" type="text" name="sku" class="form-control">
            <span v-if="errors.sku" class="error text-danger">@{{ errors.sku[0] }}</span>

            <label for="product">Producto</label>
            <input readonly="" v-model="fillProduct.name" type="text" name="name" class="form-control">
            <span v-if="errors.name" class="error text-danger">@{{ errors.name[0] }}</span>

            <label for="stock">Stock</label>
            <input v-model="fillProduct.quantity_in" type="text" name="quantity_in" class="form-control">
            <span v-if="errors.quantity_in" class="error text-danger">@{{ errors.quantity_in[0] }}</span>
        </div>
        <div class="modal-footer">
          <input type="submit" name="" class="btn btn-primary btn-xs pull-right" value="Actualizar">
        </div>
      </div>
    </div>
  </div>
</form>