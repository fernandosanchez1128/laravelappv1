<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /*!!!!la ubicacion del middleware se hace en al archivo Kernel.php!!!!*/

    public function handle($request, Closure $next)
    {

        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin'){
            return $next($request);
        
        }else{
            
            if(!Sentinel::check()){
                return redirect('/');
            }else if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
                return redirect('/administrator');
            }else if(Sentinel::getUser()->roles()->first()->slug == 'client'){
                return redirect('/client');
            }

        }
        
    }
}
