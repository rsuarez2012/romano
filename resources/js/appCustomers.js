$(function () {

    //$("#example1").DataTable();
    $('#clients-tables').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

new Vue({
	el:'#appCustomers',
	created: function(){
		this.getCustomers();
	},
	data:{
		errors: [],
		customers: [],
		a:1,
		first_name:'',
		last_name:'',
		dni:'',
		phone:'',
		email:'',
		newCustomer: {
			'first_name':'',
			'last_name':'',
			'dni':'',
			'phone':'',
			'email':'',
		},
		fillCustomer:{
			'id':'',
			'first_name':'',
			'last_name':'',
			'dni':'',
			'phone':'',
			'email':'',
		},

	},
	methods:{
		getCustomers: function(){
			let url = 'getCustomers';
			axios.get(url).then(response => {
				this.customers = response.data;
				this.a;
			})
		},
		editCustomer: function(customer){
			let url = 'customers/'+customer+'/edit';
			axios.get(url).then(response => {
				this.fillCustomer.id = response.data.id;
				this.fillCustomer.first_name = response.data.first_name;
				this.fillCustomer.last_name = response.data.last_name;
				this.fillCustomer.dni = response.data.dni;
				this.fillCustomer.phone = response.data.phone;
				this.fillCustomer.email = response.data.email;
				$('#edit_client').modal('show');

			})			
		},
		updateCustomer: function(customer){
			var url = 'customers/' + customer;
			//axios.put()
			axios.put(url, this.fillCustomer).then(response => {
				//console.log(response.data);
				this.getCustomers();
				this.errors = [];
				this.fillCustomer = {'id':'','first_name':'','last_name':'','dni':'','phone':'','email':'',};
				toastr.success('Cliente actualizado con exito.!');
				$('#edit_client').modal('hide');
				setTimeout(function(){
					location.reload();
				},500);
				
			}).catch(error => {
				this.errors = error.response.data
			});
		},
		open: function(){
			$('#create_client').modal('show');
		},
		createCustomer: function(){
			var url = 'customers';
			/*axios.post(url, {customer: this.newCustomer}).then(response => {
				console.log(response.data);
			});*/
		},
		deleteCustomer: function(customer){
			var url = 'customers/'+customer;
			axios.delete(url).then(response => {
				//cargo todos los clientes
				this.getCustomers();
				toastr.success("Usuario Eliminado con exito");
				setTimeout(function(){
					location.reload();
				},500);
			})
		}
	}
})
