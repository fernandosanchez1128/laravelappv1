<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'client'){
            return $next($request);
        }else{


            if(!Sentinel::check()){
                return redirect('/');
            }else if(Sentinel::getUser()->roles()->first()->slug == 'client'){
                return redirect('/client');
            }else if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
                return redirect('/administrator');
            }


        }
        
    }
        


    
}
