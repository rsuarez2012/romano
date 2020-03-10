new Vue({
	el: '#appAttributes',
	created: function() {
		this.getAttributes(this.pagination.current_page);
		//this.eliminarMarca();
	},
	data: {
		//todos los registro en la tabla attributes
		attributes: [],
		pagination:{
			//todo de debe iniciar en 0
			total:0,
			current_page:0,
			per_page:0,
			last_page:0,
			from:0,
			to:0,
		},
		offset:3,//variable de compensacion
		errors: [],
		//nuevo attributo
		newAttribute:'',
		hover: false,
		//actualizar el atributo
		fillAttribute: {'id':'','attribute':''},
		div_mensaje: 'Marca Existe.',
		div_clase_slug: 'bagde badge-danger',
		div_aparecer: false,
		deshabilitar_boton: 0,
	},


	computed:{
		//marca la pagina actual del paginate
		isActived: function(){
			return this.pagination.current_page;
		},
		//cantidad de elementos del paginate
		pagesNumber: function(){
			if(!this.pagination.to){
				return [];
			}
			//desde
			var from = this.pagination.current_page - this.offset;//variable de compensacion offset
			if(from < 1){
				from = 1;
			}
			//hasta
			var to = from + (this.offset * 2);
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}

			var pagesArray = [];
			while (from <= to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
		}
	},
	methods: {
		getAttributes: function(page){
			var url = 'getAttributes?page='+page;
			axios.get(url).then(response => {
				//console.log(response.data.data.data);
				this.attributes = response.data.data.data,
				this.pagination = response.data.pagination
				//this.$set('attributes', response.data.data.data);
			})
		},
		createAttribute: function(){
			this.errors = [];
			let url = 'attributes';
			axios.post(url, {attribute: this.newAttribute}).then(response => {
				this.getAttributes();
				//this.changePage(this.pagination.current_page);
				this.newAttribute = '';
				this.errors = [];
				toastr.success('Atributo registrado.!');
			}).catch(error => {
				if(error.response.status == 422){
					this.errors = error.response.data.errors

				}
			});

		},
		editAttribute: function(attribute){
			var url = 'attributes/'+attribute+'/edit';
			axios.get(url).then(response => {
				console.log(response.data);
				this.fillAttribute.id = response.data.id;
				this.fillAttribute.attribute = response.data.attribute;
				$('#edit').modal('show');
			})
		},
		updateAttribute: function(attribute){
			var url = 'attributes/'+attribute;
			axios.put(url, this.fillAttribute).then(response => {
				console.log(response.data)
				this.getAttributes();
				this.fillAttribute = {'id':'','attribute':''},
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Atributo Actualizado Correctamente.!');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		deleteAttribute:function(attribute){
			var url = 'attributes/'+attribute;
			axios.delete(url).then(response => {
				//cargo todos los usuarios
				this.getAttributes();
				toastr.success("Atributo Eliminado con exito");
			})
		},
		changePage: function(page){
			this.pagination.current_page = page;
			this.getAttributes(page);
		},
		terms: function(){
			console.log("estas redireccionando");
		}
		
	}
});
