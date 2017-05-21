


		  <a style="margin-bottom: 30px;" href="#modal_register" class="waves-effect waves-light btn amber darken-1"><i class=" material-icons">add</i> Crear rol</a>

		  <table class="bordered highlight" style="overflow: auto;max-height: 400px;">
	        <thead>

	          <tr>
	              <th class= "blue-grey lighten-3">Nombre</th>
	              <th class= "blue-grey lighten-3">Contraseña</th>
	              <th class= "blue-grey lighten-3">Editar</th>
	              <th class= "blue-grey lighten-3">Eliminar</th>
	          </tr>

	        </thead>
	        <tbody>

	        @foreach($roles as $rol)

	          <tr style="max-height: 100px;">
	            <td>
	             	{{ $rol->name }}
	            </td>
	            <td>
		        	{{ $rol->slug }}
	            </td>
	            <td>
	            	 <a class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" 
                  data-tooltip="modificar" data-position="bottom" data-delay="5" href="#update_window" 
                  onclick="mostrar_rol({{$rol->id}});">
                    <i class="small material-icons left">edit</i>
                  </a>
	            </td>
	            <td>
	            	 <a class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" 
                  data-tooltip="Eliminar" data-position="bottom" data-delay="5" href="#delete_window"
                  onclick="borrar_rol({{$rol->id}});">
                    <i class="small material-icons left">delete</i>
                  </a>
	            </td>
	          </tr>

	        @endforeach 

	        </tbody>
	      </table>