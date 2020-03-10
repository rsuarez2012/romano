new Vue ({
	el:'#appProducts',
	data:{
		brand: '',
		fillProduct: {'id':'','name':'', 'quantity_in':'', 'sku':''},
		errors:[]
	},
	methods:{
		openBrand: function(){
			$('#createBrand').modal('show')
		},
		openModal: function(product){
			var url = 'products/'+product+'/up';
			axios.get(url).then(response => {
				console.log(response.data);
				this.errors;
				this.fillProduct.id = response.data.id;
				this.fillProduct.sku = response.data.sku;
				
				this.fillProduct.name = response.data.name;
				$('#uploadStock').modal('show')
			});
		},
		updateStock: function(product){
			var url = 'products/'+product+'/upload';
			axios.post(url, this.fillProduct).then(response => {
				console.log(response.data);			
				this.fillProduct = {'id':'','name':'', 'quantity_in':'', 'sku':''}
				$('#uploadStock').modal('hide');
				toastr.success('Stock almacenado con exito.!');
				setTimeout(function(){
					location.reload();
				},500);
			});
		},
		deleteProduct: function(product){
			var url = 'products/'+product;
			axios.delete(url).then(response => {
				if(response.data == 1){
					toastr.error("El producto tiene Stock.!");
				}else{
					toastr.success("Producto eliminado con exito.!");
					setTimeout(function(){
						location.reload();
					},500);
				}			
			});
		}
	}
});
