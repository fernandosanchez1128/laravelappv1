$(document).ready(function(){
	list_Mesas();
	ListArrastre();
});

/*listar las mesas registradas*/
var list_Mesas = function(){

	var route = "/administrator/list_mesas";

	$.ajax({
		type: 'get',
		url: route,
		success: function(data){
			$('#mesa').empty().html(data);
			$('#id').val(data.id);
		},
		error: function(data){
			alert("no listo");
		},
	});

}


var ListArrastre =  function(){

	var route = "/administrator/Arrastrar";

	$.ajax({

		type: 'get',
		url: route,
		success: function(data){

			$('#inv').empty().html(data);


		},
		error: function(){
			alert('no funciona');
		},

	});
}




$('#register_mesa').on('click',function(){

	var route = "/administrator/register_mesas";
	var token = $('meta[name="csrf-token"]').attr('content');

	var nombre = $('#nombre_mesa').val();
	var dataString = 'nombre=' + nombre;

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN':token},
		type: 'post',
		datatype:'json',
		data:dataString,
		success:function(data){
			list_Mesas();
		},
		error:function(data){
			alert('la cagaste');
		},
	})

});	







