new Vue({
	el:'#main',
	created: function(){
		this.getKeeps();
		//this.deleteKeep();
	},
	data:{
		//keeps almacena todos los registos de la bd
		keeps: [],
		//newKeep lleva a crear una nueva tarea
		newKeep: '',
		//errors PAra mostrar los errores al guardar o editar un registro
		errors: [],
		//para editar usamos la variable fillKeep
		fillKeep: {'id':'', 'keep':''},
		//llave de paginacion
		pagination: {
			'total': 0,
      'current_page': 0,
      'per_page': 0,
      'last_page': 0,
      'from': 0,
      'to': 0
		},
		offset: 3,
	},
	computed:{
		isActived: function () {
			return this.pagination.current_page;
		},
		pagesNumber: function() {
			if(!this.pagination.to){
				return [];
			}
			var from = this.pagination.current_page - this.offset; //offset significa compensacion
			if(from < 1){
				from = 1;
			}
			var to = from + (this.offset * 2);
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}
			var pagesArray = [];
			while(from <= to){
				pagesArray.push(from);
				from++;
				
			}
			return pagesArray;
		}
	},
	methods: {
		//Obtengo todas las tareas
		getKeeps: function(page){
			var urlKeeps = 'http://localhost/laravel-vue-2/public/tasks?page=' + page;
			axios.get(urlKeeps).then(response => {
				//this.keeps = response.data //esta va sin paginacion
				this.keeps = response.data.tasks.data, //y esta con paginacion
				this.pagination = response.data.pagination
			});
		},
		//Eliminar tareas
		deleteKeep: function (keep) {
			var url = 'http://localhost/laravel-vue-2/public/tasks/' + keep.id;
			axios.delete(url).then(response => {
				this.getKeeps();
				 toastr.success("Tarea Eliminada con exito");
			});

		},
		editKeep: function (keep) {
			var url = 'http://localhost/laravel-vue-2/public/tasks/' + keep.id + '/edit';
			axios.get(url).then(response => {
				toastr.success("Tarea " + keep.id);
			});
		},
		//crear una tarea
		createKeep: function () {
			var url = 'http://localhost/laravel-vue-2/public/tasks';
			axios.post(url, {
				keep: this.newKeep
			}).then(response => {
				this.getKeeps();//refresco la lista de registros
				this.newKeep = '';//muestro nuevamente la variable para crear uno nuevo
				this.errors = [];//almacena los errores y quita los errores
				$('#create').modal('hide');//cierro el modal
				toastr.success('Tarea Creaa con exito');
				
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		editKeep: function (keep) {
			this.fillKeep.id = keep.id;
			this.fillKeep.keep = keep.keep;
			$('#edit').modal('show');
			
		},
		updateKeep: function (id) {
			var url = 'http://localhost/laravel-vue-2/public/tasks/' + id;
			axios.put(url, this.fillKeep).then(response => {
				this.getKeeps();
				this.fillKeep = {'id': '', 'keep': ''};
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Tarea Actualizado Correctamente');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		//metodo para cambiar de pagina
		changePage: function(page) {
			this.pagination.current_page = page;
			this.getKeeps(page);
		},
	}

});
