
$(document).ready(function(){
    listTable_Roles();
});




$("#create_role").on('click',function(){

	var route = "/administrator/create_role";

	var token = $('meta[name="csrf-token"]').attr('content');

	var name = $("#name").val();
	var slug = $("#slug").val();

    /*------------------------------------------------------------------*/
        /*permisos de usuarios*/
        var selected_users = $('#selected_user').val();
        var string_users = selected_users+"";

        /*permisos de ventas*/
        var selectedValues_ventas = $('#selected_ventas').val();
        var string_ventas = selectedValues_ventas+"";

        /*permisos de inventario*/
        var selectedValues_inventario = $('#selected_inventario').val();
        var string_inventario = selectedValues_inventario+"";

        /*permisos de archivos*/
        var selectedValues_archivos = $('#selected_archivos').val();
        var string_archivos = selectedValues_archivos+"";

        /*permisos de menu*/
        var selectedValues_menu = $('#selected_menu').val();
        var string_menu = selectedValues_menu+"";

        /*permisos de reportes*/
        var selectedValues_reportes = $('#selected_reportes').val();
        var string_reportes = selectedValues_reportes+"";
    /*-----------------------------------------------------------------*/



	var dataString = 'name=' + name
					+'&slug=' + slug
                    +'&permiso_user=' + string_users
                    +'&permiso_venta=' + string_ventas
                    +'&permiso_inventario=' + string_inventario
                    +'&permiso_archivo=' + string_archivos
                    +'&permiso_menu=' + string_menu
                    +'&permiso_reporte=' + string_reportes;            
    console.log(dataString);

    $.ajax({
    	url: route,
    	headers:{'X-CSRF-TOKEN':token},
    	type:'post',
    	datatype:'json',
    	data: dataString,
    	success: function(data){
            $("#alert_box").fadeOut();
            $("#alert_box_color").removeClass("red"); 
            $("#alert_box_color").addClass("green"); 
            $("#error").html("registro exitoso");
            $("#alert_box").fadeIn();
            listTable_Roles();
    	},
    	error: function(data){
            $("#alert_box").fadeOut();
            $("#alert_box_color").removeClass("green"); 
            $("#alert_box_color").addClass("red"); 
            $("#error").html("diligencie bien el formulario");
            $("#alert_box").fadeIn();
            listTable_Roles(); 
    	},
    })
});




/*listar los roles*/
var listTable_Roles = function(){

    var route = "/administrator/tabla_roles";

    $.ajax({
        type: 'get',
        url: route,
        success: function(data){
            $("#tabla_roles").empty().html(data);
        },
        error: function(data){
            alert(data);
        },
    })
}


/*mostrar rol*/
var mostrar_rol = function(id){
    var route = "/administrator/roles_update/"+id;
        $.get(route ,function(data){
            $("#id_actualizar").val(data.id);
            $("#edit_name").val(data.name);
            $("#edit_slug").val(data.slug);
        });
}


$("#actualizar_rol").on('click',function(){

    var route = "/administrator/roles_update_2/";

    var token = $('meta[name="csrf-token"]').attr('content');

    var id = $("#id_actualizar").val();
    var name = $("#edit_name").val();
    var slug = $("#edit_slug").val();

    /*------------------------------------------------------------------*/
        /*permisos de usuarios*/
        var selected_users = $('#selected_user_update').val();
        var string_users = selected_users+"";

        /*permisos de ventas*/
        var selectedValues_ventas = $('#selected_ventas_update').val();
        var string_ventas = selectedValues_ventas+"";

        /*permisos de inventario*/
        var selectedValues_inventario = $('#selected_inventario_update').val();
        var string_inventario = selectedValues_inventario+"";

        /*permisos de archivos*/
        var selectedValues_archivos = $('#selected_archivos_update').val();
        var string_archivos = selectedValues_archivos+"";

        /*permisos de menu*/
        var selectedValues_menu = $('#selected_menu_update').val();
        var string_menu = selectedValues_menu+"";

        /*permisos de reportes*/
        var selectedValues_reportes = $('#selected_reportes_update').val();
        var string_reportes = selectedValues_reportes+"";
    /*-----------------------------------------------------------------*/



/*el ampersan sirve como salto de linea*/
    var dataString =  'id=' + id
                    +'&name='+ name
                    +'&slug=' + slug
                    +'&permiso_user=' + string_users
                    +'&permiso_venta=' + string_ventas
                    +'&permiso_inventario=' + string_inventario
                    +'&permiso_archivo=' + string_archivos
                    +'&permiso_menu=' + string_menu
                    +'&permiso_reporte=' + string_reportes;  
                  
                    
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
                listTable_Roles();
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
var borrar_rol = function(id){
    var route = "/administrator/delete_rol_1/"+id;
        $.get(route, function(data){
            $("#input_delete").val(data.id);
            $("#producto_delete").val(data.name);
        });
}

$("#delete_button").on('click',function(){

    var route = "/administrator/delete_rol_2";
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
            listTable_Roles();
        },
        error: function(data){
            alert("no");
        }


    });
});

$(".BotonR").on('click',function(){
    
    var route = "/administrator/AsignarRol";

    $.ajax({
        url: route,
        type: 'get',
        success: function(data){
            $(".RolesDivClass").empty().html(data);   
        },
        error: function(data){
            alert("no");
        }
    });
             
});




