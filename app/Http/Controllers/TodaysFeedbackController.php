<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use Servicio\Post;
use Servicio\Feedback;
use DB;
use Mail;
use Servicio\Http\Controllers\mailController;
use Servicio\Mail\SendMailable;
use Servicio\Mail\sched;
use Servicio\Mail\email;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class TodaysFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth',['except'=>['create','store','show']]);
    }
    public function index()
    {
        App::setLocale(Session::get('applocale'));
        $v=session('res1');
        $rid=auth()->user()->restaurantID;
        $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))
        ->whereRaw("Date(created_at) = CURDATE() and restaurantID='$rid'")->paginate(7);
        
        return view('feedbacks.index')->with('feedback',$feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
