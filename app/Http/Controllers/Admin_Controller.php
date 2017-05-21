<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ productos;
use App\ mesa;
Use Sentinel;
use PDF;
/*llamado al validador*/
use App\Http\Requests\validate_Admin\validate_register_producto;
use App\Http\Requests\validate_Admin\validate_update_producto;
use App\Http\Requests\validate_Admin\validate_perfil_user;

class Admin_Controller extends Controller
{


    public function administrator(){
        //crear la vista principal
        return view('backend.admin.administrator');
    }

    public function listar_tabla_ajax(){
        $productos = productos::paginate(10);
        return view('backend.partials.tabla_productos')->with('productos',$productos);
    }


    public function logout(){
    	//desloguearse
    	Sentinel::logout();
    	//volver al login 
    	return redirect('/');
    }

    public function products_register(validate_register_producto  $request){

        
        if($request -> ajax()){
            $result = productos::create($request->all());

            if($result){
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=>'false']);
            }
        }


    }

    public function products_update_step_1($id){

        /*el metodo find trae la informacion de la fila que coincida con el parametro*/
        $result = productos::find($id);
        return response()->json($result);

    }

    public function products_update_step_2(validate_update_producto $request){

        if($request -> ajax()){
            $producto = productos::FindOrFail($request->id);
            $input = $request->all();
            $result = $producto->fill($input)->save();

            if($result){
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=>'false']);
            }
        }

    }

    public function delete_product_1($id){
        $result = productos::find($id);
        return response()->json($result);
    }

    public function delete_product_2(Request $request){

        if($request -> ajax()){

           $result = productos::find($request->id)->delete();

           if($result){
                return response()->json(['success'=>'true']);
           }else{
                return response()->json(['success'=>'false']);
           } 
        }

    }

    public function list_Mesas(){
        $mesas = mesa::all();
        return view('backend.partials.mesa')->with('mesas',$mesas);
    }

    public function Listar_Arrastre(){
        $productos = productos::all();
        return view('backend.partials.ArrasList')->with('productos',$productos);
    }

    public function register_mesa(Request $request){
        
        if($request->ajax()){

            $result = mesa::create($request->all());

            if($result){
                return response()->json(['success'=>'true']);
            }else{
                return response()->json(['success'=>'false']);
            }

        }

            
    }

    /*mostrar vista perfil*/
    public function perfil(){
        return view('backend.admin.admin_nav.perfil_admin');
    }

    /*actulaizar usuario*/
    public function update_user(validate_perfil_user $request){

        if($request->ajax()){
            $id =  (int)$request->id;
            $user = Sentinel::findById($id);

            $credentials = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'image' => $request->photo,
            ];

            $user = Sentinel::update($user, $credentials);
            
            return response()->json(['success'=>'true']);
       }

    }

    public function reportes(){
        return view('backend.admin.admin_nav.reportes_admin');
    }

    public function generate_pdf(){

        $productos = productos::all();
        $pdf = PDF::loadView('pdf', ['productos' => $productos]);
        return $pdf->download('reporte.pdf');

    }


   
  
}
