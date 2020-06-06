<?php

namespace Servicio\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($lang=null){
        //App:setlocale($lang);
         //check session 
         App::setLocale(Session::get('applocale'));
        //  dd(Session::get('applocale'));
        $title='welcome to laravel!';
        return view('pages.index')->with('title',$title);
        
    }
    public function loading(){
        //App:setlocale($lang);
       
        return view('inc.success')->with('success','Feedback Created');
        
    }
    public function admin(){
        //App:setlocale($lang);
         //check session 
         App::setLocale(Session::get('applocale'));
        //  dd(Session::get('applocale'));
        $title='welcome to Admin!';
        return view('admin.pages.index')->with('title',$title);
        
    }

}
