<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Servicio\Feedback;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
// use Feedback;
use Charts;
use Illuminate\Support\Carbon;

// use Feedback;
class AverageDailyController extends Controller
{
    public function index()
    {
       // $feedbacks=DB::select('select  created_at ,avg(averageUser) from feedbacks group by created_at');
        //select date, avg(value) from yourTable group by date
      // $feedbacks=DB::table('feedbacks')->orderByRaw('created_at DESC')->paginate(7);
        // $feedbacks=DB::select('SELECT id,fullName,email,phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at FROM feedbacks');
        //return view('averages.index')->with('feedback',$feedbacks);
        // $value = Feedback::all();
        // $value->avg('averageUser');

       
        
        //  $avgStar = Feedback::avg('averageUser');
        
        App::setLocale(Session::get('applocale'));
        //total average of today in restaurant given with specific id 
        $v=session('res1');
        $rid=auth()->user()->restaurantID;
        // $avgStar = DB::table('feedbacks')->select(DB::raw('AVG(averageUser)'))
        // ->whereRaw(" restaurantID='$v' ")->get()->pluck('AVG(averageUser)');
        $avgStar=DB::select("select avg(averageUser) as avgAll from feedbacks where restaurantID='$rid'");

  
        //total average of today in restaurant given with specific id  of todays feedbacks
        $feedbacks = DB::table('feedbacks')->select(DB::raw('AVG(averageUser),Date(created_at)'))
        ->whereRaw("Date(created_at) = CURDATE()  and  restaurantID='$rid'")->groupBy('Date(created_at)')->get()->pluck('AVG(averageUser)');
        // $feedbacks=DB::select("select avg(averageUser) as avgToday from feedbacks where 'created_at', '>=', Carbon::today()  and  restaurantID='$v' groupBy(created_at)");

        
        $feedbacks1 = DB::table('feedbacks')->select(DB::raw('AVG(averageUser) AS avg ,MONTH(created_at) AS month ,YEAR(created_at) AS year'))
        ->whereRaw("restaurantID='$rid'")->groupBy('month','year')->get();

        $feedbacks2 = DB::table('feedbacks')->select(DB::raw('COUNT(id) AS count ,MONTH(created_at) AS month ,YEAR(created_at) AS year'))
        ->whereRaw("restaurantID='$rid'")->groupBy('month','year')->get();

        $feedbacks3 = DB::table('feedbacks')->select(DB::raw('COUNT(serviceRate) AS countRate,serviceRate,MONTH(created_at) AS month ,YEAR(created_at) AS year'))
        ->whereRaw("restaurantID='$rid'")->groupBy('month','year','serviceRate')->get();

        // $byweek = Feedback::all()->groupBy(function($date) {
        //     return Carbon::parse($date->check_in)->format('W');
        // });
        

        // $byweek = $byweek->reverse();
        $byweek = DB::table('feedbacks')->select(DB::raw('AVG(averageUser) AS avg ,Week(created_at) AS week ,YEAR(created_at) AS year'))
        ->whereRaw("restaurantID='$rid'")->groupBy('week','year')->get();

        $byquarter = DB::table('feedbacks')->select(DB::raw('AVG(averageUser) AS avg ,Quarter(created_at) AS quarter ,YEAR(created_at) AS year'))
        ->whereRaw("restaurantID='$rid'")->groupBy('quarter','year')->get();
        // dd($byquarter);
        $allFeedbackJson = Feedback::all();
//         select avg(case score 
//              when 'C' then 1 
//              when 'B' then 2
//              when 'A' then 3
//              when 'AA' then 4
//              when 'AAA' then 5 
//            end) as avg_score
// from the_table;
  $serviceAverage=DB::select("select avg( case serviceRate
  when 'A' then 100
  when 'B' then 80
  when 'C' then 60
  when 'D' then 40
  when 'E' then 20
  end) as avg_service
  from feedbacks 
  where restaurantID='$rid'");

  $foodAverage=DB::select("select avg( case foodRate
  when 'A' then 100
  when 'B' then 80
  when 'C' then 60
  when 'D' then 40
  when 'E' then 20
  end) as avg_food
  from feedbacks 
  where restaurantID='$rid'");

  $sanitationAverage=DB::select("select avg( case sanitationRate
  when 'A' then 100
  when 'B' then 80
  when 'C' then 60
  when 'D' then 40
  when 'E' then 20
  end) as avg_sanitation
  from feedbacks 
  where restaurantID='$rid'");

  $musicAverage=DB::select("select avg( case musicRate
  when 'A' then 100
  when 'B' then 80
  when 'C' then 60
  when 'D' then 40
  when 'E' then 20
  end) as avg_music
  from feedbacks 
  where restaurantID='$rid'");

  $countAllTokens=DB::select("select count(id) as count from tokens where restaurantID='$rid'");
  $allTokensPerBranch=$countAllTokens[0]->count;

  $countUsedTokens=DB::select("select count(id) as count from tokens where restaurantID='$rid' and usedToken='Yes' ");
  $UsedTokenCount=$countUsedTokens[0]->count;
  $countUnusedTokens=DB::select("select count(id) as count from tokens where restaurantID='$rid' and usedToken='No' ");
  $UnusedTokenCount=$countUnusedTokens[0]->count;
 
//   dd($UnusedTokenCount);

//    dd($serviceAverage);
//    dd($foodAverage);
//    dd( $sanitationAverage);
    // dd($musicAverage);

        // dd($feedbacks3);

        //group by resID and avg pf each 
       $grouped = DB::table('feedbacks')->select(DB::raw("AVG(averageUser)  as avg ,restaurantID as rid"))->groupBy('restaurantID')->get();
    //    dd($products);
    //    $feedbacks1 = DB::table('feedbacks')->select(DB::raw('AVG(averageUser) AS avg ,MONTH(created_at) AS month ,YEAR(created_at) AS year,restaurantID'))
    //  ->whereRaw("restaurantID='$v'")->groupBy('month','year','restaurantID')->get();
    //   $countFeed=
    //     DB::table('feedbacks')->select(DB::raw('count(id)'))
    //     ->whereRaw(" restaurantID='$v' ")->get()->pluck('count(id)');
      //$products= DB::table('feedbacks')->select(DB::raw('YEAR(created_at) AS year')) ->whereRaw("restaurantID='$v'")->groupBy('year')->get();

      $chart = Charts::database(Feedback::all(), 'bar', 'highcharts')
                 ->title("Feedback Details")
                 ->elementLabel("Total Feedbacks")
                 ->values(Feedback::all())
                 ->dimensions(1000, 500)
                 ->responsive(true)
                 ->groupBy('restaurantID');
                //  ->setLables(['ridone','ridtwo','ridthre',]);
                //  ->groupByMonth(date('Y'), true);
                 
                 
                // ->groupByDay(10, true);
        // $count=DB::select("select count(id) from feedbacks where restaurantID='$v'");
        // $count = DB::table('feedbacks')->select(DB::raw('count(id)'))
        // ->whereRaw(" restaurantID='$v' ")->get()->pluck('count(id)');

        $count=DB::select("select count(id) as count
        from feedbacks 
        where restaurantID='$rid'");
        
        $allAvgs = Feedback::avg('averageUser');
         return view('averages.index',['feedback'=>$feedbacks, 'avgStar'=>$avgStar ,
         'a'=>$feedbacks1,'grouped'=>$grouped,'countF'=>$count,'allAvgs'=>$allAvgs,'chart'=>$chart, 'feedbacks3'=>$feedbacks3,
         'serviceAverage'=>$serviceAverage , 'foodAverage'=>$foodAverage,'sanitationAverage'=>$sanitationAverage,'musicAverage'=>$musicAverage,
         'UnusedTokenCount'=>$UnusedTokenCount,'UsedTokenCount'=>$UsedTokenCount,'allTokensPerBranch'=>$allTokensPerBranch
         ,'byweek'=>$byweek,'byquarter'=> $byquarter,'allFeedbackJson'=>$allFeedbackJson]);
       // return view('viewName', ['var1'=>value1,'var2'=>value2,'var3'=>value3]);
    }
}
