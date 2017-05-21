<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ publics;

class menu_admin_controller extends Controller
{
  
    public function publicar(Request $text){
  	
	  	if($text->ajax()){

	  		$holo = publics::create($text->all());

	  		if($holo){
	  			return response()->json(['success'=>'true']);
	  		}else{
	  			return response()->json(['success'=>'false']);
	  		}
	  		
	  	}

    }

   public function traido(){
   		$publicaciones = publics::all();
   		return view('backend.partials.MenuCard')->with('publicaciones',$publicaciones);
   } 


  
}
