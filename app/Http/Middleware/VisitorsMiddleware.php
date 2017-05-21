<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    /**/
    public function handle($request, Closure $next)
    {

        if(Sentinel::check() && (Sentinel::getUser()->roles()->first()->slug == 'admin' || Sentinel::getUser()->roles()->first()->slug == 'client')){/*si el usuario no esta logueado*/
            
            if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
                return redirect('/administrator');
            }else if(Sentinel::getUser()->roles()->first()->slug == 'client'){
                return redirect('/client');
            }


        }else
             return $next($request); 
    }
}
