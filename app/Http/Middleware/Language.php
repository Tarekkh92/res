<?php

namespace Servicio\Http\Middleware;

// use Closure;
// use Sessions;
// use Apps;
// use Configs;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if(Session::has('locale')){
    //         $locale=Session::get('locale',Config::get('app.locale'));

    //     }
    //     else {
    //         $locale='en';
    //     }
    //     App::setLocale($locale);
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        
        //  $lang = $request->get('language');
         $lang=Session::get('applocale');
         dd($lang);
         //Log::info($lang);
        //App::setLocale(Session::get('applocale'));
          App::setLocale($lang);
         return $next($request);
  
    }
}


