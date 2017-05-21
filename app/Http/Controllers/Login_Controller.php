<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Sentinel;

class Login_Controller extends Controller
{
     /*muestra el index*/
	public function login()
	{
		return view('frontend.visitors_views.index');
	}

	public function post_login(Request $request){

		$this->validate($request, [/*validar los campos*/
            'email' => ['required','max:255'],
            'password' => ['required','max:255'],
        ]);

		//loguear un usuario
		Sentinel::authenticate($request->all());
		//
		if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
			return redirect('/administrator');
		}elseif(Sentinel::getUser()->roles()->first()->slug == 'client'){
			return redirect('/client');
		}
		

	}

}
