<?php

namespace Servicio\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Servicio\AnonymousFeedback;
use Servicio\Feedback;
use GuzzleHttp\Client;
use DateInterval;
use DB;
use Mail;
use Servicio\Http\Controllers\mailController;
use Servicio\Mail\SendMailable;
use Servicio\Mail\sched;
use Servicio\Mail\email;
class AnonymousController extends Controller
{
    
    
    public function index()
    {
        App::setLocale(Session::get('applocale'));
        $v=session('res1');
        $feedbacks=DB::select("select * from anonymous_feedbacks where restaurantID='$v'");
        return view('Anonymous.feedbacks.index')->with('feedback',$feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id=session('res1');
        // dd($id);
        $id=Session::get('fid');
        //dd($id);

        switch ($id) {
            case 1:
               
                session(['res1'=> $id]);
                return view('Anonymous.feedbacks.create');
                break;
            case 2:
                session(['res1'=> $id]);
                return view('Anonymous.feedbacks.create');
                break;
            case 3:
                session(['res1'=> $id]);
                return view('Anonymous.feedbacks.create');
                break;
            
            default:
               return view('inc.noSuchPage');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    dd($request->rating_3,$request->rating_2,$request->rating_3,$request->rating_4);
        // var x = document.getElementsByClassName("rating");
        //  dd($request->input['star4']);
        $value = (float)session('res1');
        // $v=(float)$value;
        // dd($value);
        $this->validate($request, [
            'rating'=>'required',
            'rating_2'=>'required',
            'rating_3'=>'required',
            'rating_4'=>'required',
            // 'body'=>['required',"regex: '/(^([a-zA-Z]+)(\d+)?$)/u' "]
            'body'=>'regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            //^[\u0621-\u064A]+$
            //^\p{Lu}\p{Ll}+( \p{Lu}\p{Ll}+)*$
            ///(^([a-zA-Z]+)(\d+)?$)/u 
        ]);
        $feedback = new Feedback;
        $feedback->fullName = 'Anonymous';
        $feedback->email = 'Anonymous';
        $feedback->phone = 'Anonymous';
        $feedback->serviceRate=$request->rating;
        $feedback->foodRate=$request->rating_2;
        $feedback->sanitationRate=$request->rating_3;
        $feedback->musicRate=$request->rating_4;
        $feedback->body = $request->input('body');
        $feedback->restaurantID= $value;
        
        $feedback->userIP=$request->ip();
        $feedback->userAGENT=$request->server('HTTP_USER_AGENT');
        //  dd( $feedback->serviceRate, $feedback->foodRate,$feedback->sanitationRate, $feedback->musicRate);
        $data =array(
            'rateService' => $request->rating,
            'rateFood' => $request->rating_2,
            'rateSanitation' => $request->rating_3,
            'rateMusic' => $request->rating_4,
            'body' => $request->input('body'),
        );
        $serviceChar=$this->getPoints($data['rateService']);
        $foodChar=$this->getPoints($data['rateFood']);
        $saniationChar =$this->getPoints($data['rateSanitation']);
        $musicChar=$this->getPoints($data['rateMusic']);
        
        // $serviceChar=$feedback->serviceRate;
        // $foodChar=$feedback->foodRate;
        // $saniationChar =$feedback->sanitationRate;
        // $musicChar=$feedback->musicRate;
        // dd($serviceChar);
        $average=$this->getAverage( $serviceChar,$foodChar,$saniationChar,$musicChar);
        // dd($average);
        //  echo $average;
        $feedback->averageUser=$average;
        $feedback->body=strip_tags($feedback->body);
        // $googleToken=$request->input('g-recaptcha-response');
        // if(strlen($googleToken)>0){
        //     $client =new Client(); 
        //     $response=$client->post('https://www.google.com/recaptcha/api/siteverify', [
        //         'form_params'=> array(
        //         'secret'=>'6LelSHUUAAAAADl07LuZp02zQj8uNMtk3N1u-Mp8',
        //         'response'=>$googleToken

        //     )
            
        //     ]);
        //     $result = json_decode( $response->getBody()->getContents());
        //    if($result->success){
           
                // Mail::to( $feedback->email)->send(new sched($token));
                // dd('i');
                // if($average<35.0){
                // Mail::to('khalailyt@gmail.com')->send(new email($feedback));
                // }
             
                $feedback->save();
             return redirect('/success')->with('success', 'Feedback Created');

        //    }
        //    else{return view('inc.redirect');}
        // }
        //  else{return view('inc.redirect');}
        
      
        // $feedback->save();

        // return redirect('/success')->with('success', 'Anonymous Feedback Created');
    }
    function getPoints($letter){        
        switch ($letter) 
        {
            case "5":
                //echo "A!";
                return 100;
                break;
         
            case "4":
               // echo "B!";
                return 80;
                break;
          
            case "3":
                //echo "C!";
                return 60;
                break;
         
            case "2":
                //echo "D!";
                return 40;
                break;
          
            case "1":
                //echo "E!";
                return 20;
                break;
            default:
                echo "Error";
        }            
    }
    function getAverage($a,$b,$c,$d){
        $sum=$a+$b+$c+$d;
        return (float)$sum/4;
    
    
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
