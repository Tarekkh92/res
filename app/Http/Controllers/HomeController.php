<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use Servicio\User;
use DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
// use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = \Auth::id();
        $user = User::find($userId);
        App::setLocale(Session::get('applocale'));
        // dd(Session::get('applocale'));
        if($user->restaurantID == 0)
        {
            $feedbacks=DB::select("select * from feedbacks");
            return view('admin.feedbacks.index')->with('feedback',$feedbacks);
        }
        return view('home');
    }
    // public function index() { 
        //$userId = \Auth::id();

    //     $user = User::find($userId);
        
    //     if($user->admin == 1)
    //     {
    //         return view('admin');
    //     }
    //     return view('home');
    // }
}
