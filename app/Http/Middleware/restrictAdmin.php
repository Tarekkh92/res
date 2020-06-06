<?php

namespace Servicio\Http\Middleware;

use Closure;

class restrictAdmin
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
        $rid=auth()->user()->restaurantID;
        // dd($rid);
        if( $rid == 1 ||  $rid==2 || $rid==3 ){
             return $next($request);
        }
        return redirect('/home');
    }
    
}
