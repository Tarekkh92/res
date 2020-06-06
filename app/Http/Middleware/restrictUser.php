<?php

namespace Servicio\Http\Middleware;

use Closure;

class restrictUser
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
        // $rid=session('res1');
        $rid=auth()->user()->restaurantID;
        //dd($rid);
        // $rid=1;
        if($rid==0){
            // return view('home');
             return $next($request);
        }
        // if($rid == null){
        //     return redirect('/');     
        // }
        //else{return view('');}
        
        // throw new \Exception("Restricted access to such a page ");
        return redirect('/');
    }
}
