<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*FROTEND*///////////////////////////////////////////////////////////////////////

	//agrupacion de middleware para acceso de usuarios no registrados
	/*
	*esta marica funciona sola con clienty visitors
	*/


	Route::group(['middleware' => 'visitor'], function(){
		/*envia el parametro /login. netodo login en register_controller;*/
		Route::get('/', 'Login_Controller@login');
		Route::post('/login/form', 'Login_Controller@post_login');

		/*envia el parametro /register. metodo register en Register_controller*/
		Route::get('/register', 'Register_Controller@register');
		Route::post('/register/form', 'Register_Controller@post_register');
		Route::post('/register/focusout','Register_Controller@focusout');

	});


	//agrupacion de middleware para acceso de usuarios registrados en el rol client
	Route::group(['middleware' => 'client'], function(){
		/*envia el parametro /usuarios. metodo index en usuarios*/
		Route::get('/client','Clients_Controller@index');
		Route::post('/client','Clients_Controller@logout');
	});
		

/////////////////////////////////////////////////////////////////////////////////
/*BACKEND*///////////////////////////////////////////////////////////////////////	

	Route::group(['middleware' => 'admin'], function(){
		/*panel de administracion*/

		/*pagina principal*/
		Route::get('/administrator','Admin_Controller@administrator');
		/*desloguearse*/
		Route::post('/administrator/logout','Admin_Controller@logout');

		/*carga de la tabla de productos*/
		/*
		*el signo de interogacion hace que la variable page sea opcional
		*/
		Route::get('/administrator/tabla_productos/{page?}','Admin_Controller@listar_tabla_ajax');
		/*registrar producto*/
		Route::post('/administrator/products_register','Admin_Controller@products_register');
		/*editar producto*/
		Route::get('/administrator/products_update/{id?}','Admin_Controller@products_update_step_1');
		Route::put('/administrator/products_update_2/{request?}','Admin_Controller@products_update_step_2');
		/*eliminar producto*/
		Route::get('/administrator/delete_1/{id?}','Admin_Controller@delete_product_1');
		Route::delete('/administrator/delete_2','Admin_Controller@delete_product_2');

		/*
		*
		*
		*manejo de las mesas
		*/
		/*listar las mesas*/
		Route::get('/administrator/list_mesas','Admin_Controller@list_Mesas');
		/*registrar las mesas*/
		Route::post('/administrator/register_mesas','Admin_Controller@register_mesa');
		/*Listar los productos*/
		Route:: get('/administrator/Arrastrar','Admin_Controller@Listar_Arrastre');






		/*perfil admin*/
		Route::post('/administrator/perfil_admin','Admin_Controller@perfil');
		/*actualizar usuarios*/
		Route::post('/administrator/update_user','Admin_Controller@update_user');



		
		/*reportes admin*/
		Route::post('/administrator/reportes_admin','Admin_Controller@reportes');
		/*generar pdf*/
		Route::get('/administrator/pdf','Admin_Controller@generate_pdf');




		/*roles admin*/
		Route::post('/administrator/roles_admin','Roles_Controller@roles');
		/*crear rol*/
		Route::post('/administrator/create_role','Roles_Controller@create_role');
		/*listar rol*/
		Route::get('/administrator/tabla_roles','Roles_Controller@list_Roles');
		/*editar rol*/
		Route::get('/administrator/roles_update/{id?}','Roles_Controller@roles_update_step_1');
		Route::put('/administrator/roles_update_2/{request?}','Roles_Controller@roles_update_step_2');
		/*eliminar rol*/
		Route::get('/administrator/delete_rol_1/{id?}','Roles_Controller@delete_rol_1');
		Route::delete('/administrator/delete_rol_2','Roles_Controller@delete_rol_2');
		/*cargar roles*/
		Route::get('/administrator/AsignarRol','Roles_Controller@CargarRol');






		/*registrar usuario backend*/
		Route::post('/administrator/register_user_admin','user_admin_controller@Register_User_Admin');
		/*listar usuarios administradores*/
		Route::get('/administrator/list_users','user_admin_controller@List_table_users_admins');
		/*eliminar usuarios admin  --------------problema-------------------*/
		Route::get('/administrator/delete_user_admin_1/{id?}','user_admin_controller@delete_user_admin_1');
		Route::delete('/administrator/delete_user_admin_2','user_admin_controller@delete_user_admin_2');





		/*Menu*/
	    Route::post('/administrator/menupublic','menu_admin_controller@publicar');
	    Route::get('/administrator/traer','menu_admin_controller@traido');
		

		

	});
		



//////////////////////////////////////////////////////////////////////////////////
