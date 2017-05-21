<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\ productos;
use App\ mesa;
use App\ User;
use App\ users_admin;

Use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;

use App\Http\Requests\validate_Admin\validate_register_user;

class user_admin_controller extends Controller
{
    
	 /*registrar usuario en backend*/
    public function Register_User_Admin(validate_register_user $request){

        if($request->ajax()){

            /*variable donde almaceno el valor del selected del rol*/
            $rol = $request->rol;
            $email = $request->email;

            /*registrar usuario*/
            $user = Sentinel::registerAndActivate($request->all());
            $ptr = users_admin::create($request->all());


            //$sss = DB::table('users')->where('email', $email)->get();
            //traer un rol
            $role = Sentinel::findRoleBySlug($rol);
            //asignar el rol
            $role->users()->attach($user);

            //$sss = DB::table('users')->where('email', $email)->get();
            
            if($role){
                return response()->json(['success'=>$ptr]);
           }else{
                return response()->json(['success'=>$ptr]);
           } 
               
        }
    }

    
    public function List_table_users_admins(Request $request){

    	$users = users_admin::all();
        //return response()->json(view('backend.partials.partial_products', compact('productos'))->render());
        return view('backend.partials.tabla_users')->with('users',$users);

    }

    /*borrar usuario admin*/
    public function delete_user_admin_1($id){
        $user = DB::table('users_admins')->where('id', $id)->get();
        //$user = Sentinel::findById($id);
        return response()->json($user);
    }

    public function delete_user_admin_2(Request $request){

        if($request -> ajax()){

           $id = (int)$request->id;
           $email = $request->email;
           $result = DB::table('users_admins')->where('email', $email)->delete();
           $user = DB::table('users')->where('id', $id)->delete();

           if($result){
                return response()->json(['success'=>'true']);
           }else{
                return response()->json(['success'=>'false']);
           } 
        }

    }

}
