@extends('backend.admin.admin_nav.master_nav')

@section('content')
	<!-- action="/administrator/update_user" -->

	<div class="row">
	  <div class="col s4 offset-s4" style="min-height: 400px;margin-top: 50px;overflow: auto;
	  background-color: rgba(0,0,0,0.4); border-radius: 30px;">

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
	  
		<form  method="POST" id="form_update_perfil" enctype="multipart/form-data">


	  		<div style="text-align:center;">
		  	<img src="/images/user2.png" class="image_perfil">

			  <form action="#">
			    <div class="file-field input-field">
			      <div class="btn">
			        <span>File</span>
			        <input type="file">
			      </div>
			      <div class="file-path-wrapper">
			        <input id="photo"  class="file-path validate" type="text">
			      </div>
			    </div>
			  </form>

			</div>
			<div class="col s12" >


				
				<input id="id" name="id" type="hidden" class="white-text validate" value="@if(Sentinel::check()) {{Sentinel::getUser()->id }} @endif">

				<!--Nuevo Nombre-->
		  		<div class="input-field col s12">
		          <input id="name" name="name" type="text" class="validate">
		          <label for="last_name">Nuevo Nombre</label>
		        </div>
				<!--Nuevo email-->
		  		<div class="input-field col s12">
		          <input id="email" name="email" type="text" class="validate">
		          <label for="last_name">Nuevo email</label>
		        </div>
		        <!--contraseña actual-->
		         <div class="input-field col s12">
		          <input id="password" name="password" type="password" class="validate">
		          <label for="password">Contraseña actual</label>
		         </div>
		        <!--nueva contraseña-->
		         <div class="input-field col s12">
		          <input id="new_password" name="new_password" type="password" class="validate" onchange="disable_password()">
		          <label for="password">Nueva contraseña</label>
		         </div>
		        <!--repita contraseña-->
		         <div class="input-field col s12">
		          <input id="repeat_password" name="repeat_password" type="password" class="validate" onchange="disable_repeatPassword()">
		          <label for="password">Repita nueva contraseña</label>
		         </div>
		        <!--boton guardar-->
		         <center><button type="button" id="update_user" class="waves-effect waves-light btn center amber darken-1" style="border-radius: 50px;margin-bottom: 20px;margin-top: 20px;" disabled="true"><i class="material-icons right">save</i>Guardar</button></center>
			</div>
		</form>
	  </div>
	</div>

	<script type="text/javascript">
		function disable_password(){
			var password = document.getElementById("new_password").value;
			var repeat_password = document.getElementById("repeat_password").value;
			if(password == repeat_password){
				document.getElementById("update_user").disabled = false;
			}else{
				document.getElementById("update_user").disabled = true;
			}
		}

		function disable_repeatPassword(){
			var password = document.getElementById("new_password").value;
			var repeat_password = document.getElementById("repeat_password").value;
			if(password == repeat_password){
				document.getElementById("update_user").disabled = false;
			}else{
				document.getElementById("update_user").disabled = true;
				alert("Las oontraseñas no coinciden!!!");
			}
		}

	</script>

@endsection
