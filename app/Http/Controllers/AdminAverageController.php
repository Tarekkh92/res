<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Servicio\Feedback;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class AdminAverageController extends Controller
{
    public function index()
    {
       //all resid average
        $allAvgs = Feedback::avg('averageUser');
        //group by resID and avg pf each 
       $grouped = DB::table('feedbacks')->select(DB::raw("AVG(averageUser)  as avg ,restaurantID as rid"))->groupBy('restaurantID')->get();
       

    //    $feedbacks1 = DB::table('feedbacks')->select(DB::raw('AVG(averageUser) AS avg ,MONTH(created_at) AS month ,YEAR(created_at) AS year'))
    //    ->groupBy('month','year')->get();
    $res1 = DB::table('feedbacks')->select(DB::raw('AVG(averageUser),Date(created_at)'))
    ->whereRaw("Date(created_at) = CURDATE()  and  restaurantID=1")->groupBy('Date(created_at)')->get()->pluck('AVG(averageUser)');
        
       
         return view('admin.averages.index',['grouped'=>$grouped,'allAvgs'=>$allAvgs,]);
       // return view('viewName', ['var1'=>value1,'var2'=>value2,'var3'=>value3]);
    }
}
