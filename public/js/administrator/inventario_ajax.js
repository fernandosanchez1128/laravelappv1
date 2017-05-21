/*
*Caundo se cargue la pagina entonces
*ejecutar los metodos que se encuentran adentro
*/
$(document).ready(function(){
	listTable_Products();
});




/*listar los productos*/
var listTable_Products = function(){

	var route = "/administrator/tabla_productos";

	$.ajax({
		type: 'get',
		url: route,
		success: function(data){
			$('#ajax_products').empty().html(data);
		}
	});
}






/*
*al oprimir la paginacion ejecutar la consulta de los siguientes registros
*/
$(document).on('click','.pagination li a', function(e){
	//para bloquear sus eventos
	e.preventDefault();
	//toma la direccion de la pagina*//*split divide la cadena para solotomar el id
	/*var page = $(this).attr('href').split('page=')[1];*/
	var route = $(this).attr("href");
	$.ajax({
		url: route,
		/*data: {page: page},*/
		type: 'get',
		/*dataType: 'json',*/
		success: function(data){
			$("#ajax_products").empty().html(data);/*carga el partial en el div*/
		}
	});
	
});










/*registrar productos*/
$("#registrar").on('click',function(){
 
	var route = "/administrator/products_register";
	//var token = $("input[name = _token]").val();
	var token = $('meta[name="csrf-token"]').attr('content');

	/*tomar los valores insertados en los campos*/
	var nombre = $("#regi_nombre").val();
	var precio_de_compra = $("#regi_precio_de_compra").val();
	var precio_de_venta = $("#regi_precio_de_venta").val();
	var cantidad = $("#regi_cantidad").val();

	var total_compra = precio_de_compra*cantidad;
	var total_venta = precio_de_venta*cantidad;
	var ganancia_unitaria = precio_de_venta-precio_de_compra;
	var ganancia_total = total_venta-total_compra;

	/*arreglo con los valores tomados para ser enviado*/
	var dataString = 'nombre='+ nombre
                    + '&precio_de_compra=' + precio_de_compra        
                    + '&precio_de_venta=' + precio_de_venta
                    + '&cantidad=' + cantidad
                    + '&ganancia_unitaria=' + ganancia_unitaria
                    + '&total_compra=' + total_compra
                    + '&total_venta=' + total_venta
                    + '&ganancia_total=' + ganancia_total;

	$.ajax({
		url:route,
		/*larvel genera untoken que tiene que tomarse para autenticar el registro*/
		headers:{'X-CSRF-TOKEN':token},
		type:'post',
		datatype:'json',
		data:dataString,
		success:function(data){
			//if(data.success == true){
				$("#alert_box").fadeOut();
				$("#alert_box_color").removeClass("red"); 
				$("#alert_box_color").addClass("green"); 
				$("#error").html("registro exitoso");
				$("#alert_box").fadeIn();
			//}
		},
		error:function(data){
			$("#alert_box").fadeOut();
			$("#alert_box_color").removeClass("green"); 
			$("#alert_box_color").addClass("red"); 
			$("#error").html("diligencie bien el formulario");
			$("#alert_box").fadeIn();
			//listMessage_Products();
		},
	})
});





/*actualizar productos*/

/*toma el id y los valores de la fila y lo envia al model para su posterior acualizacion
el modal se llama desde el boton en el href*/
var mostrar = function(id){
	var route = "/administrator/products_update/"+id;
	    $.get(route ,function(data){
	    	$("#id_actualizar").val(data.id);
			$("#nombre_actualizar").val(data.nombre);
			$("#precio_de_compra_actualizar").val(data.precio_de_compra);
			$("#precio_de_venta_actualizar").val(data.precio_de_venta);
			$("#cantidad_actualizar").val(data.cantidad);
	    });
}

$("#actualizar").on('click',function(){

	var route = "/administrator/products_update_2/";

	var token = $('meta[name="csrf-token"]').attr('content');

	var id = $("#id_actualizar").val();
	var nombre = $("#nombre_actualizar").val();
	var precio_de_compra = $("#precio_de_compra_actualizar").val();
	var precio_de_venta = $("#precio_de_venta_actualizar").val();
	var cantidad = $("#cantidad_actualizar").val();

	var total_compra = precio_de_compra*cantidad;
	var total_venta = precio_de_venta*cantidad;
	var ganancia_unitaria = precio_de_venta-precio_de_compra;
	var ganancia_total = total_venta-total_compra;



/*el ampersan sirve como salto de linea*/
	var dataString =  'id=' + id
					+ '&nombre='+ nombre
                    + '&precio_de_compra=' + precio_de_compra        
                    + '&precio_de_venta=' + precio_de_venta
                    + '&cantidad=' + cantidad
                    + '&ganancia_unitaria=' + ganancia_unitaria
                    + '&total_compra=' + total_compra
                    + '&total_venta=' + total_venta
                    + '&ganancia_total=' + ganancia_total;
                    
  	$.ajax({
  		url: route,
  		headers: {'X-CSRF-TOKEN': token},
  		type: 'put',
  		dataType: 'json',
  		data: dataString,
  		success: function(data){
  			//if (data.success == true) {
  				$("#alert_box_update").fadeOut();
  				$("#alert_box_update_color").removeClass("red"); 
  				$("#alert_box_update_color").addClass("green"); 
				$("#error_update").html("registro exitoso");
				$("#alert_box_update").fadeIn();
  				listTable_Products();
  			//}	
  		},
  		error: function(data){
  			$("#alert_box_update").fadeOut();
  			$("#alert_box_update_color").removeClass("green"); 
  			$("#alert_box_update_color").addClass("red"); 
			$("#error_update").html("diligencie bien el formulario");
			$("#alert_box_update").fadeIn();
  		}
  	});
  	
});

/*toma el valor del id y el nombre para tenerlos en el modal*/
var borrar = function(id){
	var route = "/administrator/delete_1/"+id;
		$.get(route, function(data){
			$("#input_delete").val(data.id);
			$("#producto_delete").val(data.nombre);
		});
}

$("#delete_button").on('click',function(){

	var route = "/administrator/delete_2";
	var token = $('meta[name="csrf-token"]').attr('content');

	var id = $("#input_delete").val();
	var dataString = 'id=' + id;

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'delete',
		dataType: 'json',
		data: dataString,
		success: function(data){
			listTable_Products();
		},
		error: function(data){
			alert("no");
		}


	});
});
