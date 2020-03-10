new Vue({
	el: '#appUsers',
	created: function() {
		this.getUsers(this.pagination.current_page);
		//this.eliminarMarca();
	},
	data: {
		errors: [],
		//todos los registro en la tabla users
		users: [],
		//nuevo usuario
		newUser:'',
		//actualizar usuario
		fillUser: {'id':'','name':'','email':'','password':''},
		brand: '',
		div_mensaje: 'Marca Existe.',
		div_clase_slug: 'bagde badge-danger',
		div_aparecer: false,
		deshabilitar_boton: 0,
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
		getUsers(page){
			var url = 'getUsers?page='+page;
			axios.get(url).then(response => {
				this.users = response.data.data.data;
				this.pagination = response.data.pagination;
			})
		},
		editUser: function(user){
			var url = 'users/'+user+'/edit';
			axios.get(url).then(response => {
				this.fillUser.id = response.data.id;
				this.fillUser.name = response.data.name;
				this.fillUser.email = response.data.email;
				this.fillUser.password = response.data.password;
				$('#edit').modal('show');
			})
		},
		updateUser: function(user){
			var url = 'users/'+user;
			axios.put(url, this.fillUser).then(response => {
				this.getUsers();
				this.fillUser = {'id':'','name':'','email':'', 'password':''},
				$('#edit').modal('hide');
				toastr.success('Usuario Actualizado Correctamente');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		deleteUser:function(user){
			var url = 'users/'+user;
			axios.delete(url).then(response => {
				//cargo todos los usuarios
				this.getUsers();
				toastr.success("Usuario Eliminado con exito");
			})
		},
		createUser: function(){
			let url = 'users';
			axios.post(url, {users: this.newUser}).then(response => {
				this.getUsers();
				this.newUser = '';
				this.errors = [];
				toastr.success('Usuario registrado.!');
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		changePage: function(page){
			this.pagination.current_page = page;
			this.getUsers(page);
		}
	}
});
