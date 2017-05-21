@extends('backend.admin.admin_nav.master_nav')


@section('content')

<!--modal crear roles-->
  <div id="modal_register" class="modal transparent-style col s12">
    <div class="modal-content col s12">

    <!--mensaje-->
    	<div class="row" id="alert_box" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_color">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>


    	 <table class="bordered highlight col s12" style="overflow: auto;max-height: 400px;">
	        <thead>
	          <tr>
	              <th class= "blue-grey lighten-3">Nombre</th>
	              <th class= "blue-grey lighten-3">Slug</th>
	              <th class= "blue-grey lighten-3">Usuarios</th>
	              <th class= "blue-grey lighten-3">Ventas</th>
	              <th class= "blue-grey lighten-3">Inventario</th>
	              <th class= "blue-grey lighten-3">Admin archivos</th>
	              <th class= "blue-grey lighten-3">Menu</th>
	              <th class= "blue-grey lighten-3">Reportes</th>
	              <th class= "blue-grey lighten-3"></th>
	        </thead>
	        <tbody>
	          <tr style="max-height: 100px;">

	            <td>
	             <div class="input-field">
		          <input id="name" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>

	            <td>
	             <div class="input-field">
		          <input id="slug" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_user">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_ventas">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_inventario">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>		
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_archivos">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_menu">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_reportes">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
	              <a id="create_role" class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1"
                    data-tooltip="Registrar" data-position="bottom" data-delay="5">
                    <i class="small material-icons left">check</i>
                  </a>

	            </td>
	          </tr>
	        </tbody>
	     </table>  

    </div>
  </div>
<!--*************************************-->



<!--********************-->
  <!-- Modal Structure delete-->
  <div id="delete_window" class="modal">
    <div class="modal-content">
      <h5 class="center-align"><i class="medium material-icons">warning</i>¿esta seguro de eliminar este registro?</h5>
      <div class="container">
        <input type="text" maxlength="11" id="producto_delete" name="cantidad" class="txt-hueco_actualizar"
         required>
        <h2 id=""></h2>
        <input type="hidden" id="input_delete" name="input_delete">
        <a  id="delete_button" class="modal-action modal-close waves-effect waves-orange btn-flat">aceptar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">cancelar</a>
      </div>
    </div>
  </div>



  <!-- Modal Structure delete user-->
  <div id="delete_window_user" class="red modal">
    <div class="modal-content">
      <h5 class="center-align"><i class="medium material-icons">warning</i>¿esta seguro de eliminar este registro?</h5>
      <div class="container">
        <input type="text" maxlength="11" id="user_delete" name="cantidad" class="txt-hueco_actualizar"
         required>
        <h2 id=""></h2>
        <input type="text" id="id_delete" name="input_delete">
        <a  id="delete_button_user" class="modal-action modal-close waves-effect waves-orange btn-flat">aceptar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">cancelar</a>
      </div>
    </div>
  </div>

<!--********************-->


<!--modal editar roles-->
  <div id="update_window" class="modal transparent-style">
    <div class="modal-content">

    <!--mensaje-->
    	<div class="row" id="alert_box" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_color">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>


    	 <table class="bordered highlight" style="overflow: auto;max-height: 400px;">
	        <thead>
	          <tr>

	               <th class= "blue-grey lighten-3">Nombre</th>
	              <th class= "blue-grey lighten-3">Slug</th>
	              <th class= "blue-grey lighten-3">Usuarios</th>
	              <th class= "blue-grey lighten-3">Ventas</th>
	              <th class= "blue-grey lighten-3">Inventario</th>
	              <th class= "blue-grey lighten-3">Admin archivos</th>
	              <th class= "blue-grey lighten-3">Menu</th>
	              <th class= "blue-grey lighten-3">Reportes</th>
	              <th class= "blue-grey lighten-3"></th>
	          </tr>
	        </thead>
	        <tbody>
	          <tr style="max-height: 100px;">

	          	
		        <input id="id_actualizar" type="hidden" class="validate" required="required">
	

	            <td>
	             <div class="input-field">
		          <input id="edit_name" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>

	            <td>
	             <div class="input-field">
		          <input id="edit_slug" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>
	            
	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_user_update">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_ventas_update">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_inventario">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>		
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_archivos">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_menu">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					    <option value="2">actualizar</option>
					    <option value="3">eliminar</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
		            <div class="input-field col s12 left">
					  <select multiple id="selected_reportes">
					    <option value="" disabled selected>seleccionar</option>
					    <option value="1">crear</option>
					  </select>
				  	</div>	
	            </td>

	            <td>
	              <a id="actualizar_rol" class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1"
                    data-tooltip="Registrar" data-position="bottom" data-delay="5" href="#update_window">
                    <i class="small material-icons left">check</i>
                  </a>
	            </td>
	          </tr>
	        </tbody>
	     </table>  

    </div>
  </div>
<!--*************************************-->




<!--modal crear usuario admin -->
  <div id="modal_user" class="modal transparent-style">



    <div class="modal-content">

    	<!--mensaje-->
    	<div class="row" id="alert_box_user" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_color_user">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error_user"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close_user" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>

    	 <table class="bordered highlight" style="overflow: auto;max-height: 400px;">
	        <thead>
	          <tr>
	              <th class= "blue-grey lighten-3">Nombre</th>
	              <th class= "blue-grey lighten-3">Correo</th>
	              <th class= "blue-grey lighten-3">Contraseña</th>
	              <th class= "blue-grey lighten-3">rol</th>
	              <th class= "blue-grey lighten-3"></th>
	          </tr>
	        </thead>
	        <tbody>
	          <tr style="max-height: 100px;">
	            <td>
	            <div class="input-field">
		          <input id="nombre" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>
	            <td>
	            <div class="input-field">
		          <input id="correo" style="width: 80%;" type="email" class="validate" required="required">
		      	 </div>
	            </td>
	            <td>
	            <div class="input-field">
		          <input id="contraseña" style="width: 80%;" type="password" class="validate" required="required">
		      	 </div>
	            </td>
	            <td>
		            <div class="RolesDivClass" id="roles_div">
					 	
				  	</div>	
	            </td>
	            <td>
	            	 <a id="register_user_admin" class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" 
                  data-tooltip="Registrar" data-position="bottom" data-delay="5">
                    <i class="small material-icons left">check</i>
                  </a>
	            </td>
	          </tr>
	        </tbody>
	     </table>  
    </div>
  </div>
<!--*************************************-->

<div class="row">
		
		<!--listado de roles creados-->
		<div id="tabla_roles" class="col s8 offset-s2" style="margin-top: 50px;">

		  
		</div>



		<!--listado de usuarios con sus roles-->
		<div class="col s8 offset-s2 b" style="margin-top: 50px;">

		<a id="BotonR" style="margin-bottom: 30px;" href="#modal_user" class="BotonR waves-effect waves-light btn amber darken-1"><i class=" material-icons">add</i> Crear usuario administrador </a>

		  	<div id="tabla_users">
		  		
		  	</div>

		</div>
		
	</div>

<!--modal de actualizar usuario backend-->
<div id="updateUserRol_window" class="modal transparent-style">
    <div class="modal-content">

    <!--mensaje-->
    	<div class="row" id="alert_box" hidden="true">
        <div class="col s12 m12">
          <div class="card red darken-1" id="alert_box_color">
            <div class="row">
              <div class="col s12 m10">
                <div class="card-content white-text">
                  <strong id="error"></strong>
              </div>
            </div>
            <div class="col s12 m2">
              <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
            </div>
          </div>
         </div>
        </div>
      </div>


    	 <table class="bordered highlight" style="overflow: auto;max-height: 400px;">
	        <thead>
	          <tr>

	               <th class= "blue-grey lighten-3">Nombre</th>
	               <th class= "blue-grey lighten-3">Contraseña</th>
	               <th class= "blue-grey lighten-3">Rol</th>
	               <th class= "blue-grey lighten-3">Email</th>
	              <th class= "blue-grey lighten-3"></th>
	          </tr>
	        </thead>
	        <tbody>
	          <tr style="max-height: 100px;">

	          	
		        <input id="id_actualizar_user" type="hidden" class="validate" required="required">
	

	            <td>
	             <div class="input-field">
		          <input id="editName_User" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>

	            <td>
	             <div class="input-field">
		          <input id="editContraseña_User" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>
	            <td>
		            <div class="RolesDivClass" id="roles_div_user">
					 	
				  	</div>	
	            </td>
	            <td>
	             <div class="input-field">
		          <input id="editEmail_User" style="width: 80%;" type="text" class="validate" required="required">
		      	 </div>
	            </td>
	            <td>
	              <a id="actualizar_User" class="BotonR tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1"
                    data-tooltip="Registrar" data-position="bottom" data-delay="5">
                    <i class="small material-icons left">check</i>
                  </a>
	            </td>
	          </tr>
	        </tbody>
	     </table>  

    </div>
  </div>	
	
	

	

@endsection