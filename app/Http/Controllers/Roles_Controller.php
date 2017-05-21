<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ productos;
use App\ mesa;
use App\ users_admin;
Use Sentinel;


use App\Http\Requests\validate_Admin\validate_create_rol;
use App\Http\Requests\validate_Admin\validate_update_rol;


class Roles_Controller extends Controller
{
     
    public function roles(){
        return view('backend.admin.admin_nav.roles_admin');
    }

    /*crear roles*/
    public function create_role(validate_create_rol $request){

        if($request->ajax()){

            $permiso_user = $request->permiso_user;
            $permiso_inventario = $request->permiso_inventario;
            $permiso_venta = $request->permiso_venta;
            $permiso_archivo = $request->permiso_archivo;
            $permiso_menu = $request->permiso_menu;
            $permiso_reporte = $request->permiso_reporte;

            
            $role = Sentinel::getRoleRepository()->createModel()->create([
                'name' => $request->name,
                'slug' => $request->slug,
            ]);

            switch ($permiso_user) {
                case '1':
                    $role->addPermission('user.create');
                    $role->addPermission('user.update',false);
                    $role->addPermission('user.delete',false);
                    break;
                case '2':
                    $role->addPermission('user.create',false);
                    $role->addPermission('user.update');
                    $role->addPermission('user.delete',false);
                    break;
                case '3':
                    $role->addPermission('user.create',false);
                    $role->addPermission('user.update',false);
                    $role->addPermission('user.delete');
                    break;
                case '1,2':
                    $role->addPermission('user.create');
                    $role->addPermission('user.update');
                    $role->addPermission('user.delete',false);
                    break;            
                case '1,3':
                    $role->addPermission('user.create');
                    $role->addPermission('user.update',false);
                    $role->addPermission('user.delete');
                    break;
                case '2,3':
                    $role->addPermission('user.update',false);
                    $role->addPermission('user.update');
                    $role->addPermission('user.delete');
                    break;
                case '1,2,3':
                    $role->addPermission('user.create');
                    $role->addPermission('user.update');
                    $role->addPermission('user.delete');
                    break; 
                case '':
                    $role->addPermission('user.create',false);
                    $role->addPermission('user.update',false);
                    $role->addPermission('user.delete',false);
                    break;
            }



            switch ($permiso_inventario) {
                case '1':
                    $role->addPermission('productos.create');
                    $role->addPermission('productos.update',false);
                    $role->addPermission('productos.delete',false);
                    break;
                case '2':
                    $role->addPermission('productos.create',false);
                    $role->addPermission('productos.update');
                    $role->addPermission('productos.delete',false);
                    break;
                case '3':
                    $role->addPermission('productos.create',false);
                    $role->addPermission('productos.update',false);
                    $role->addPermission('productos.delete');
                    break;
                case '1,2':
                    $role->addPermission('productos.create');
                    $role->addPermission('productos.update');
                    $role->addPermission('productos.delete',false);
                    break;            
                case '1,3':
                    $role->addPermission('productos.create');
                    $role->addPermission('productos.update',false);
                    $role->addPermission('productos.delete');
                    break;
                case '2,3':
                    $role->addPermission('productos.create',false);
                    $role->addPermission('productos.update');
                    $role->addPermission('productos.delete');
                    break;
                case '1,2,3':
                    $role->addPermission('productos.create');
                    $role->addPermission('productos.update');
                    $role->addPermission('productos.delete');
                    break; 
                case '':
                    $role->addPermission('productos.create',false);
                    $role->addPermission('productos.update',false);
                    $role->addPermission('productos.delete',false);
                    break;
            }

            switch ($permiso_venta) {
                case '1':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
                case '2':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;
                case '3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;            
                case '1,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '2,3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break; 
                case '':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
            }

           /*/ switch ($permiso_archivo) {
                case '1':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
                case '2':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;
                case '3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;            
                case '1,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '2,3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break; 
                case '':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
            }*/

            /*switch ($permiso_menu) {
                case '1':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
                case '2':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;
                case '3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete',false);
                    break;            
                case '1,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete');
                    break;
                case '2,3':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break;
                case '1,2,3':
                    $role->addPermission('mesa.create');
                    $role->addPermission('mesa.update');
                    $role->addPermission('mesa.delete');
                    break; 
                case '':
                    $role->addPermission('mesa.create',false);
                    $role->addPermission('mesa.update',false);
                    $role->addPermission('mesa.delete',false);
                    break;
            }*/

            /*switch ($permiso_reporte) {
                case '1':
                    $role->addPermission('reporte.create');
                    break;
                case '':
                    $role->addPermission('reporte.create',false);
                    break;
            }*/





            $role->save();

            if($role){
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=>'false']);
            }

        }

    }

    /*listar roles*/
    public function list_Roles(){
        $roles = Sentinel::getRoleRepository()->get();
        return view('backend.partials.tabla_roles')->with('roles', $roles);
    }


    /*actualizar roles*/
    public function roles_update_step_1($id){
        $result = Sentinel::findRoleById($id);
        return response()->json($result);
    }

    public function roles_update_step_2(validate_update_rol $request){

        if($request -> ajax()){

            $permiso_user = $request->permiso_user;
            $permiso_inventario = $request->permiso_inventario;
            $permiso_venta = $request->permiso_venta;
            $permiso_archivo = $request->permiso_archivo;
            $permiso_menu = $request->permiso_menu;
            $permiso_reporte = $request->permiso_reporte;

            $id = (int)$request->id;
            $role = Sentinel::findRoleById($id);
            $input = $request->all();
            

            switch ($permiso_user) {
                case '1':
                    $role->updatePermission('user.create');
                    $role->updatePermission('user.update',false);
                    $role->updatePermission('user.delete',false);
                    break;
                case '2':
                    $role->updatePermission('user.create',false);
                    $role->updatePermission('user.update');
                    $role->updatePermission('user.delete',false);
                    break;
                case '3':
                    $role->updatePermission('user.create',false);
                    $role->updatePermission('user.update',false);
                    $role->updatePermission('user.delete');
                    break;
                case '1,2':
                    $role->updatePermission('user.create');
                    $role->updatePermission('user.update');
                    $role->updatePermission('user.delete',false);
                    break;            
                case '1,3':
                    $role->updatePermission('user.create');
                    $role->updatePermission('user.update',false);
                    $role->updatePermission('user.delete');
                    break;
                case '2,3':
                    $role->updatePermission('user.create',false);
                    $role->updatePermission('user.update');
                    $role->updatePermission('user.delete');
                    break;
                case '1,2,3':
                    $role->updatePermission('user.create');
                    $role->updatePermission('user.update');
                    $role->updatePermission('user.delete');
                    break; 
                case '':
                    $role->updatePermission('user.create',false);
                    $role->updatePermission('user.update',false);
                    $role->updatePermission('user.delete',false);
                    break;
            }

            switch ($permiso_inventario) {
                case '1':
                    $role->updatePermission('productos.create');
                    $role->updatePermission('productos.update',false);
                    $role->updatePermission('productos.delete',false);
                    break;
                case '2':
                    $role->updatePermission('productos.create',false);
                    $role->updatePermission('productos.update');
                    $role->updatePermission('productos.delete',false);
                    break;
                case '3':
                    $role->updatePermission('productos.create',false);
                    $role->updatePermission('productos.update',false);
                    $role->updatePermission('productos.delete');
                    break;
                case '1,2':
                    $role->updatePermission('productos.create');
                    $role->updatePermission('productos.update');
                    $role->updatePermission('productos.delete',false);
                    break;            
                case '1,3':
                    $role->updatePermission('productos.create');
                    $role->updatePermission('productos.update',false);
                    $role->updatePermission('productos.delete');
                    break;
                case '2,3':
                    $role->updatePermission('productos.create',false);
                    $role->updatePermission('productos.update');
                    $role->updatePermission('productos.delete');
                    break;
                case '1,2,3':
                    $role->updatePermission('productos.create');
                    $role->updatePermission('productos.update');
                    $role->updatePermission('productos.delete');
                    break; 
                case '':
                    $role->updatePermission('productos.create',false);
                    $role->updatePermission('productos.update',false);
                    $role->updatePermission('productos.delete',false);
                    break;
            }


            switch ($permiso_venta) {
                case '1':
                    $role->updatePermission('mesa.create');
                    $role->updatePermission('mesa.update',false);
                    $role->updatePermission('mesa.delete',false);
                    break;
                case '2':
                    $role->updatePermission('mesa.create',false);
                    $role->updatePermission('mesa.update');
                    $role->updatePermission('mesa.delete',false);
                    break;
                case '3':
                    $role->updatePermission('mesa.create',false);
                    $role->updatePermission('mesa.update',false);
                    $role->updatePermission('mesa.delete');
                    break;
                case '1,2':
                    $role->updatePermission('mesa.create');
                    $role->updatePermission('mesa.update');
                    $role->updatePermission('mesa.delete',false);
                    break;            
                case '1,3':
                    $role->updatePermission('mesa.create');
                    $role->updatePermission('mesa.update',false);
                    $role->updatePermission('mesa.delete');
                    break;
                case '2,3':
                    $role->updatePermission('mesa.create',false);
                    $role->updatePermission('mesa.update');
                    $role->updatePermission('mesa.delete');
                    break;
                case '1,2,3':
                    $role->updatePermission('user.create');
                    $role->updatePermission('user.update');
                    $role->updatePermission('user.delete');
                    break; 
                case '':
                    $role->updatePermission('mesa.create',false);
                    $role->updatePermission('mesa.update',false);
                    $role->updatePermission('mesa.delete',false);
                    break;
            }

            $result = $role->fill($input)->save();



            if($result){
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=>'false']);
            }
        }

    }


    /*borrar rol*/
    public function delete_rol_1($id){
        $role = Sentinel::findRoleById($id);
        return response()->json($role);
    }

    public function delete_rol_2(Request $request){

        if($request -> ajax()){

           $id = (int)$request->id;
           $result = Sentinel::findRoleById($id)->delete();

           if($result){
                return response()->json(['success'=>'true']);
           }else{
                return response()->json(['success'=>'false']);
           } 
        }

    }


    public function CargarRol(){
        $roles = Sentinel::getRoleRepository()->get();
        return view('backend.partials.selected_roles')->with('roles', $roles);
    }



}


