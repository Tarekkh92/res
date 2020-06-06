<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
USE Servicio\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App;
use Lang;



class LanguageController extends Controller
{

    // public function changeLanguage(Request $req){
    //     if($req->ajax()){
    //         $req->session()->put('locale',$req->locale);
    //         $req->session()->flash('alert-success',
    //         ('app.locale_Change_Success'));
    //     }
    // }
    public function index()
	{
      
        Session::put('locale', Input::get('locale'));
        // dd(Session::get('locale'));
        return Redirect::back();
        // return view('pages.index');
    }
    



}
