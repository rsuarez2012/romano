new Vue({
	el: '#appTerms',
	created: function() {
		this.getCategory();
	},
	data: {
		attribute_id:'',
		name: '',
		slug: '',
		description:'',
		fillTerm:{'id':'','attribute_id':'','name':'','slug':'','description':''},
		errors: [],
		pagination:'',
		div_mensajeSlug: 'Slug Existe.',
		div_clase_slug: 'badge badge-danger',
		div_aparecer: false,
		deshabilitar_boton: 0,
	},
	computed: {
		generarSlug : function(){
			var char = {
				"á":"a","é":"e","í":"i","ó":"o","ú":"u",
				"Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
				"Ñ":"N","ñ":"n"," ":"-","_":"-"
			}
			var expresion = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
			this.slug = this.name.trim().replace(expresion, function(e){
				return char[e]
			}).toLowerCase()
			return this.slug;
		},
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
		getCategory(){
			var slug = this.generarSlug;
			if(this.slug){

				let url = 'getCategory/'+slug;
				axios.get(url).then(response => {
					this.div_mensajeSlug = response.data;
					if(this.div_mensajeSlug === "Slug Disponible"){
						this.div_clase_slug = 'badge badge-success';
						this.deshabilitar_boton = 0;
					}else{
						this.div_clase_slug = 'badge badge-danger';
						this.deshabilitar_boton = 1;
					}
					this.div_aparecer = true;
					
				})
			}else{
				this.div_clase_slug = 'badge badge-danger';
				this.div_mensajeSlug = "Nombre de la categoria.!";
				this.deshabilitar_boton = 1;
				this.div_aparecer = true;
			}
		},
		editTerm: function(id){
			var url = 'terms/'+id+'/edit';
			axios.get(url).then(response => {
				console.log(response.data);
				//this.errors = '';
				this.fillTerm.id = response.data.id;
				this.fillTerm.attribute_id = response.data.attribute_id;
				this.fillTerm.name = response.data.name;
				this.fillTerm.slug = response.data.slug;
				this.fillTerm.description = response.data.description;
				$('#edit').modal('show');
			})
		},
		updateTerm: function(id){
			var url = 'terms/'+id;
			axios.put(url, this.fillTerm).then(response => {
				$('#edit').modal('hide');
				//this.categories();
				this.fillTerm = {'id':'','attribute_id':'','name':'','slug':'','description':''};
				this.errors = [];
				toastr.success('Termino editado con exito.!');
				setTimeout(function(){
					location.reload();
				},500);
			}).catch(error => {
				//this.errors = error.response.data
			});

		},
		deleteTerm: function(id){
			var url = 'terms/'+id;
			axios.delete(url).then(response => {
				toastr.success("Termino Eliminado con exito");
				setTimeout(function(){
					location.reload();
				},500);
			})
		},
		createTerm: function(){
			let url = 'terms';
			axios.post(url, {
					attribute_id: this.attribute_id,
					name: this.name,
					slug: this.slug,
					description: this.description,
				}).then(response => {
				this.errors = [];
				this.attribute_id = '';
				this.name = '';
				this.slug = '';
				this.description = '';
				toastr.success('Termino registrado con exito.!');
				setTimeout(function(){
					location.reload();
				},500);
			}).catch(error => {
				if(error.response.status == 422){
					this.errors = error.response.data.errors

				}
			});
		}
	}
});