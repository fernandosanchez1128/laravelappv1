/*Ajax Menu*/
$(document).ready(function(){
	Cargar();
});


$("#Publico").on('click',function(){
	var route = "/administrator/menupublic";

	var token = $('meta[name="csrf-token"]').attr('content');

	var coment = $("#textarea1").val();

	var dataString = 'texto=' + coment;

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: dataString,
		success: function(data){
			Cargar();
		},
		error: function(data){
			alert('NO');
		},
	}); 

});



var Cargar = function(){
	var route = "/administrator/traer";

	$.ajax({
		url: route,
		type: 'get',
		success: function(data){
			$("#MenuCard").empty().html(data);
		},
		error: function(data){
			alert("aca nada");
		},
	});

}