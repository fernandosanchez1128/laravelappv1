$(document).ready(function(){
	listar_users_admins();
});

/*actualizar datos de perfil*/
$('#update_user').on('click' , function(){
	
	var route = "/administrator/update_user";

	var token =  $('meta[name="csrf-token"]').attr('content');

	var id = $('#id').val();
	var name = $('#name').val();
	var email = $('#email').val();
	var new_password = $('#new_password').val();
    var image = $('#photo').val();
	

	var dataString = 'id=' + id
					+'&name=' + name	
					+'&email=' + email
					+'&password=' + new_password
                    +'&photo=' + image;
    console.log(dataString);                

	$.ajax({

		url: route,
		headers: {'X-CSRF-TOKEN':token},
		type: 'post',
		dataType: 'json',
		data: dataString,

		success: function(data){
			//alert(dataString);
			$("#alert_box").fadeOut();
			$("#alert_box_color").removeClass("red"); 
			$("#alert_box_color").addClass("green"); 
			$("#error").html("registro exitoso");
			$("#alert_box").fadeIn();
		},
		error: function(data){
			//alert("no");
			$("#alert_box").fadeOut();
			$("#alert_box_color").removeClass("green"); 
			$("#alert_box_color").addClass("red"); 
			$("#error").html("diligencie bien el formulario");
			$("#alert_box").fadeIn();
		},
	});				

});



/*
*
*Registro de usuario Backend
*
*
*
*/


/*listar usuarios administradores*/
 var listar_users_admins = function(){
 	var route = "/administrator/list_users";

 	$.ajax({
 		url: route,
 		type: 'get',
 		success: function(data){
 			$("#tabla_users").empty().html(data);
 		},
 		error: function(data){
 			alert('no conecto');
 		},
 	});

 }

/*registrar usuarios administradores*/
$('#register_user_admin').on('click', function(){

    var route = "/administrator/register_user_admin";
    var token = $('meta[name="csrf-token"]').attr('content');

    var name = $('#nombre').val();
    var email = $('#correo').val();
    var password = $('#Contraseña').val();

    /*tomar valor del select*/
    var selectedValues_rol = $( "#selected_roles option:selected" ).text();
    /************************/

    var dataString = 'name=' + name
                     +'&email=' + email
                     +'&password=' + password
                     +'&rol='+ selectedValues_rol;
               

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
        dataType:'json',
        data: dataString,
        success: function(data){
            $("#alert_box_user").fadeOut();
            $("#alert_box_color_user").removeClass("red"); 
            $("#alert_box_color_user").addClass("green"); 
            $("#error_user").html("registro exitoso");
            $("#alert_box_user").fadeIn();
            listar_users_admins();
            alert(data.success);
        },
        error: function(data){
            $("#alert_box_user").fadeOut();
            $("#alert_box_color_user").removeClass("green"); 
            $("#alert_box_color_user").addClass("red"); 
            $("#error_user").html("diligencie bien el formulario");
            $("#alert_box_user").fadeIn();
            alert(data.success);
        }
    });
});

/*toma el valor del id y el nombre para tenerlos en el modal*/
var borrar_user_admin = function(id){
    var route = "/administrator/delete_user_admin_1/"+id;
        $.get(route, function(data){
        	alert(data.id +"  "+ data.email);
            $("#id_delete").val(data.id);
            $("#user_delete").val(data.name);
        });
}

$("#delete_button_user").on('click',function(){

    var route = "/administrator/delete_user_admin_2";
    var token = $('meta[name="csrf-token"]').attr('content');

    var email = $("#email_delete").val();
    var dataString = 'email=' + email;

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'delete',
        dataType: 'json',
        data: dataString,
        success: function(data){
            listar_users_admins();
        },
        error: function(data){
            alert("no");
        }


    });
});



