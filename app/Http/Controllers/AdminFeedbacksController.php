<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminFeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','store','show']]);
    }
    public function index()
    {
        // $v=session('res1');
        // $feedbacks=DB::select("select * from feedbacks");
        $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))->paginate(10);

    //"select * from customers where username='$productID'";
    //    $feedbacks=DB::table('feedbacks')->orderByRaw('created_at DESC')->paginate(7);
        // $feedbacks=DB::select('SELECT id,fullName,email,phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at FROM feedbacks');
        return view('admin.feedbacks.index')->with('feedback',$feedbacks);
    }
}
