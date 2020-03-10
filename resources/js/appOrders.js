$(document).ready(function(){
	//evaluar el select al momento de cambiar el producto
	$('#selectProduct').on('change', function(){
        	var val_product = $(this).val();
        	//console.log(val_product);
        	var separador = "_";
        	product = val_product.split(separador);
		//Asigno el codigo y nombre del producto al input product
        	$('#product').val(product[3]+' '+product[4]);              
		//Asigno el stock del producto al input stock
        	$('#stock').val(product[2]);
		//Asigno el precio del producto al input buy
        	$('#buy').val(product[1]);

		//campo oculto de id del producto
		$('#product_id').val(product[0]);
		//campo oculto de sku
		$('#sku').val(product[3]);
		//campo oculto de producto
		$('#prod').val(product[4]);       
        	
    	});
	//al dar click al boton añadir detalle
	$('#add').click(function(){
		//llamo a la funcion add
		add();
	});
	//variables globales para los detalles de la venta
	//contador para cada uno de los tr
	count = 0;
	//total del pedido
	total = 0;

	//sub = 0;
	//subtotal del pedido
	subTotal = [];

	//oculto el boton de registrar
	$('#guardar').hide();

	function add(){
		//variable para el sku
		sku = $('#sku').val();
		//variable para el producto
		prod = $('#prod').val();
		//variable para la cantidad
		quantity = $('#quantity').val();
		//variable para el precio
		buy = $('#buy').val();
		//variable para el stock
		stock = $('#stock').val();
		//variable con el id del producto
	        product_id = $('#product_id').val();

		
		if(prod != "" && quantity !="" && quantity>0){		
			if(parseInt(stock) >= parseInt(quantity)){
				subTotal[count] = (quantity*buy);
                total = total + subTotal[count];
                console.log(total);

				//console.log("el subtotal es: "+subTotal[count]+" el total es: "+total);
				var fila = '<tr class="selected" id="fila'+count+'" style="text-align:center;"><td text-align="center">'+sku+'</td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+prod+'</td><td><input type="hidden" name="quantity_product[]" value="'+quantity+'">'+quantity+'</td><td><input type="hidden" name="buy[]" value="'+parseFloat(buy).toFixed(2)+'">'+buy+'</td><td><button type="button" class="btn bg-purple btn-xs" value="eliminar" onclick="return eliminar('+count+')" title="Eliminar">X</button></td></tr>';
				//incremento el contador en 1
				count++;
				//limpiar los inputs
				clear();
				//Totales de la venta
				totales();
				//muestro el boton de registrar
				evaluar();
				//agrego la fila a la tabla detalles
				$('#details').append(fila);
			}else{
				toastr.error("La cantidad del producto supera el stock.!");		
			}
		}else{
			toastr.error("Debe ingresar una cantidad a descontar del stock.!");
		}
	}
	
	//funcion para limpiar los inputs de los detalles del producto
	function clear(){
		$("#quantity").val("");
		$("#stock").val("");
		$("#product").val("");
		$("#buy").val("");
	}
	function totales(){
		sub = total + subTotal[count];
		total_pagar = total + subTotal[count];
		$('#sub-total').html('$. ' + total.toFixed(2));
		$('#total_sell').html('$. ' + total.toFixed(2));
	}
	function evaluar(){
		if(total>0){

        	$("#guardar").show();

        }else{
              
        	$("#guardar").hide();
        }
	}

});



new Vue ({
	el:'#appOrders',
	data:{
		fillOrder: {'id':'','status':''}
		
	},
	computed:{
		
	},
	methods:{
		
		deleteOrder: function(order){
			var url = 'orders/'+order;
			if(confirm('Esta seguro que desea anular este pedido?'))
				axios.delete(url).then(response => {
					console.log(response.data.detailorder)
					toastr.success('Pedidos cancelado con exito.!');
					setTimeout(function(){
							location.reload();
						},500);
				})
		},
		openModal: function(product){
			var url = 'orders/'+product;
			axios.get(url).then(response => {
				console.log(response.data);

			})
			$('#show').modal('show');
		},
		updateStock: function(product){
			
		},
		
	}
});
