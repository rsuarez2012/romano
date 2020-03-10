new Vue({
	el: '#form-brand',
	created: function() {
		this.getBrand();
		//this.eliminarMarca();
	},
	data: {
		errors: [],
		brand: '',
		div_mensaje: 'Marca Existe.',
		div_clase_slug: 'bagde badge-danger',
		div_aparecer: false,
		deshabilitar_boton: 0,
	},
	methods: {
		
		getBrand(){
			//toastr.success('Bienvenidos');
			this.errors = [];
			let brands = $('#brand').val();

			if(brands == ""){
				console.log("Debe colocar el Nombre de la marca.!");

				this.deshabilitar_boton = 1;
				//var erro = this.errors.push('El campo marca esta vacio');
				//console.log(erro);
			}else{
				console.log("marca es " + brands);
				let url = 'brands/registers/'+brands;
				axios.get(url).then(response => {
					if(response.data > 0){
						toastr.success('La marca: '+ brands +' existe');
						//$('#brand').val('').focus();
						this.deshabilitar_boton = 1;
					}else{
						this.deshabilitar_boton = 0;
						//console.log('Se registro la marca: '+brands+' con exito.!');
					}
				});

			}
			
		},
		prueba(){
			let input = $("#brand").val();
			let url = 'brands/registers/'+input;
			axios.get(url).then(response => {
				if(response.data > 0){
					console.log('La marca: '+ input +' existe');
					$('#brand').val('').focus();
					this.deshabilitar_boton = 1;
				}else{
					this.deshabilitar_boton = 0;
				}
			})
		}
	}
});
new Vue({
	el: '#body-brand',
	data: {
		fillBrand: {'id':'','brand':''},
	},
	methods: {
		deleteBrand: function(brand){
			console.log(brand);

			var url = 'brand/' + brand;
			axios.delete(url).then(response => {
				//this.getBrands();
				toastr.success("eliminado con exito");
				setTimeout(function(){
					location.reload();
				},200);
			});
		},
		editBrand: function(brand){
			var url = 'brand/edit/'+brand;
			axios.get(url).then(response => {
				this.fillBrand.id = response.data.id;
				this.fillBrand.brand = response.data.brand;
				$('#edit').modal('show');
			});
		},
		updateBrand: function(brand){
			var url = 'brand/' + brand;
			//axios.put()
			axios.post(url, this.fillBrand).then(response => {
				this.fillBrand = {'id':'','brand':''};
				//this.errror = [];
				$('#edit').modal('hide');
				toastr.success('Marca actualizada con exito.!');
				setTimeout(function(){
					location.reload();
				},900);
			}).catch(error => {
				//this.errors = error.response.data
			});
		}
	}

});