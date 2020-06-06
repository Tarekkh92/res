<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show','edit','update','store','index']]);
    }
    public function index()
    {
         //$tokens=DB::select('select * from tokens');
        // $tokens=DB::table('tokens')->simplePaginate(15);
        //$users = DB::table('users')->simplePaginate(15);
         //$tokens=DB::table('tokens')->orderByRaw('created_at DESC')->get();

      
        $tokens = DB::table('tokens')->select(DB::raw('*'))->get();

        // $feedbacks=DB::select('SELECT id,fullName,email,phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at FROM feedbacks');
        return view('admin.tokens.index')->with('tokens',$tokens);
    }
}
