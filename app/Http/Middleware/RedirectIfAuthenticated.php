<?php

namespace Servicio\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       
        // dd(json_encode($request));
        App::setLocale(Session::get('applocale'));
        //App::setLocale(Session::get('res1'));
        //    dd(Session::get('res1'));
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }


        return $next($request);
    }
}
