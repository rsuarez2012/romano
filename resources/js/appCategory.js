new Vue({
	el: '#form',
	created: function() {
		this.getCategory();
	},
	data: {
		category: '',
		slug: '',
		fillCategory:{'id':'','category':'','slug':'','description':''},
		errors: [],

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
			this.slug = this.category.trim().replace(expresion, function(e){
				return char[e]
			}).toLowerCase()
			return this.slug;
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
		editCategory: function(category){
			var url = 'categories/'+category+'/edit';
			axios.get(url).then(response => {
				console.log(response.data);
				this.errors = '';
				this.fillCategory.id = response.data.id;
				this.fillCategory.category = response.data.category;
				this.fillCategory.slug = response.data.slug;
				this.fillCategory.description = response.data.description;
				$('#edit').modal('show');
			})
		},
		updateCategory: function(category){
			var url = 'categories/'+category;
			axios.put(url, this.fillCategory).then(response => {
				$('#edit').modal('hide');
				//this.categories();
				this.fillCategory = {'id':'','category':'','slug':'','description':''};
				this.errors = [];
				toastr.success('Categoria editada con exito.!');
				setTimeout(function(){
					location.reload();
				},600);
			}).catch(error => {
				//this.errors = error.response.data
			});

		},
		deleteCategory: function(category){
			var url = 'categories/'+category;
			axios.delete(url).then(response => {
				toastr.success("Categoria Eliminada con exito");
				setTimeout(function(){
					location.reload();
				},500);
			})
		}
	}
});
