@extends('frontend.visitors_views.master')


@section('content')

<div class="col s12 m6">
		
		<div class="card transparent-style center__cardview" style= 'width: 100%; height: 100%;'>
            <div class="card-content white-text">

              	
              	<form action="{{ url('/register/form') }}" method="POST" name="form_login">
              		{{ csrf_field() }}

					 <div class="row">
				        <div class="input-field col s12 center__textfield " style= 'width: 100%; height: 100%;'>
				          <input type="email" class="validate" id="email" name="email" required>
				          <label for="email" data-error="Email incorrecto" data-success="bien" style="color: rgb(255,255,255);">Email
				          </label>
				        </div>
				      </div>

				     <div class="row">
					  <div class="input-field col s12">
				        <input type="text" class="validate" id="name" name="name" required>
				        <label for="last_name" data-error="campo vacio" style="color: rgb(255,255,255);">Nombre Usuario</label>
				      </div>
				     </div>

		          	 

		        	  <div class="row">
				        <div class="input-field col s12 center__textfield " style= 'width: 100%; height: 100%;'>
				          <input type="password" class="validate" id="password" name="password"   
				          pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange="disable_password()" required>
				          <label for="password" data-error="La contraseña debe tener mayusculas, minusculas y numeros" data-success="bien" style="color: rgb(255,255,255);">Contraseña</label>
				        </div>
				      </div>

				      <div class="row">
				        <div class="input-field col s12 center__textfield " style= 'width: 100%; height: 100%;'>
				          <input type="password" class="validate" id="repeat_password"  name="repeat_password"
				          pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange="disable_repeatPassword()" required>
				          <label for="password" data-error="La contraseña debe tener mayusculas, minusculas y numeros" data-success="bien" style="color: rgb(255,255,255);">Repita Contraseña</label>
				        </div>
				      </div>

		            </div>

		            	<button class="waves-effect amber btn boton__ingresar black-text" type="submit" id="button_registrar" 
		            	disabled="true">Registrar
		            	</button>

		        	<div style="height: 30px;"></div>

				</form>  

        </div>

    </div>


<script type="text/javascript">
$("#email").on('focusout', function(){

	var route = "/register/focusout";
	var token = $('meta[name="csrf-token"]').attr('content');

	var login = $(this).val().split('@')[0];
	var dataString = 'nombre=' + login;
	$.ajax({
		url: route,
		headers:{'X-CSRF-TOKEN':token},
		data: dataString,
		type:'post',
		datatype:'json',
		success:function(data){
			if(data.success == true){
				var aux = login+"1";
				$("#name").val(aux);
			}else{
				$("#name").val(login);
			}
		},
		error:function(){
			alert("la cagaste");
		}
	});


	
});


</script>

@endsection

			


