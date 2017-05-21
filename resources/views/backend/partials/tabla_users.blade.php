<table class="bordered highligh" tstyle="overflow: auto;">
	<thead>
	    <tr>
	    	<th class= "blue-grey lighten-3">Nombre</th>
	    	<th class= "blue-grey lighten-3">Correo</th>
	    	<th class= "blue-grey lighten-3">Editar</th>
	    	<th class= "blue-grey lighten-3">Eliminar</th>
	    </tr>
	</thead>
	     
	<tbody>
		@foreach($users as $user)
	    <tr>
	        <td>{{$user->name}}</td>
	        <td>{{$user->email}}</td>
	        <td>
	            <a id="modal_update_user" class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" 
                data-tooltip="modificar" data-position="bottom" data-delay="5" href="#updateUserRol_window" 
                onclick="mostrar_user({{$user->id}});">
                <i class="small material-icons left">edit</i>
                </a>
	        </td>
	        <td>
	            <a class="tooltipped waves-effect waves-circle waves-light btn-floating secondary-content amber darken-1" 
                data-tooltip="Eliminar" data-position="bottom" data-delay="5" href="#delete_window_user"
                onclick="borrar_user_admin({{$user->id}});">
                <i class="small material-icons left">delete</i>
                </a>
	        </td>
	    </tr>
	    @endforeach
	</tbody>
</table>