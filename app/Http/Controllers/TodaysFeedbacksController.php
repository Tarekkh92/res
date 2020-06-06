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
class TodaysFeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))
        ->whereRaw('Date(created_at) = CURDATE()')->get();
        
        return view('feedbacks.index')->with('feedback',$feedbacks);
    }
}
