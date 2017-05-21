@extends('frontend.visitors_views.master')


@section('content')

	<div class="col s6 m6">
		

		<div class="card transparent-style center__cardview" style= 'width: 100%; height: 100%;'>
            <div class="card-content white-text">

              	
              	<form action="{{ url('/login/form') }}" method="POST" name="form_login">
					{{ csrf_field() }}
				

		          	  <div class="row">
				        <div class="input-field col s12 center__textfield " style= 'width: 100%; height: 100%;'>
				          <input id="email" type="email" class="validate" name="email">
				          <label for="email" data-error="Email incorrecto" data-success="bien" name="label_email" style="color: rgb(255,255,255);">
				          Correo
				          </label>
				        </div>
				      </div>


		        	  <div class="row">
				        <div class="input-field col s12 center__textfield " style= 'width: 100%; height: 100%;'>
				          <input id="password" type="password" class="validate" name="password" >
				          <label for="password" name="label_password" style="color: rgb(255,255,255);">Contraseña</label>
				        </div>
				      </div>

		            </div>

		            	<button class="waves-effect amber btn boton__ingresar black-text" type="submit" id="button_login">Ingresar
		            	</button>

		        	<div style="height: 30px;"></div>

				</form> 
				<h6 class="center-align">Si no tienes cuenta oprima <a class="amber-text" href="/register" style="text-decoration: underline;">aqui</a></h6>

        </div>

    </div>
        
			

			    
@endsection


			





