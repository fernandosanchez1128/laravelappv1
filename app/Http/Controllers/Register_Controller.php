<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

use App\Http\Requests\validate_visitors\validate_register_user;

class Register_Controller extends Controller
{
    /*muestra la pagina de registro*/
	public function register()
	{
		return view('frontend.visitors_views.register');
	}

	public function focusout(Request $request){

		if($request->ajax()){

			$result = Sentinel::findById("");

			if($result){
				return response()->json(['success'=>'true']);
			}else{
				return response()->json(['success'=>'false']);
			}
		}

	}

	/*mutoma los datos y registra al usuario*/
	public function post_register(validate_register_user $request)
	{
		
			/*registrar usuario*/
			$user = Sentinel::registerAndActivate($request->all());
	    	//traer un rol
			$role = Sentinel::findRoleBySlug('client');
			//asignar el rol
			$role->users()->attach($user);
			//volver al login
	    	return redirect('/');

		
	}
}


//buscar EloquentRole.php ... info