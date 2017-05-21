<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class Clients_Controller extends Controller
{
    public function index(){
    	return view('frontend.clients_views.client');
    }

    public function logout(){
    	//desloguearse
    	Sentinel::logout();
    	//volver al login
    	return redirect('/login');
    }
}
