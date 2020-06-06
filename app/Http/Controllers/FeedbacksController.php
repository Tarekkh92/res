<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Servicio\Post;
use Servicio\Feedback;
use Servicio\Token;
use DB;
use Mail;
use Servicio\Http\Controllers\mailController;
use Servicio\Mail\SendMailable;
use Servicio\Mail\sched;
use Servicio\Mail\email;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use DateInterval;



class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','store','show']]);
    }

    public function index()
    {
        App::setLocale(Session::get('applocale'));
        $v=session('res1');
        $rid=auth()->user()->restaurantID;
        // $rid=DB::select("select restaurantID from users where ");
        // dd($rid);
        // $feedbacks=DB::select("select * from feedbacks where feedbacks.restaurantID='$rid' ");
    //union select id,'Anonymous' as fullName,'Anonymous' as email, 'Anonymous' as phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at,averageUser,restaurantID,'Anonymous' as userIP ,'Anonymous' as userAGENT from anonymous_feedbacks where anonymous_feedbacks.restaurantID='$rid'
    //"select * from customers where username='$productID'";
    //$feedbacks=DB::table('feedbacks')->orderByRaw('created_at DESC')->paginate(7);
    $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))
    ->whereRaw("restaurantID='$rid'")->paginate(7);
    

        // $feedbacks=DB::select('SELECT id,fullName,email,phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at FROM feedbacks');
        return view('feedbacks.index')->with('feedback',$feedbacks);
    }


 
    public function create($id=null)
    {
        //$id=session('res1');
        //dd(url()->current());
        // dd($id);
        // $id=Session::get('fid');
        // dd($id);
        
        switch ($id) {
            case 1:
                //code to be executed if n=label1;
                session(['res1'=> $id]);
                return view('feedbacks.create');
                break;
            case 2:
                session(['res1'=> $id]);
                return view('feedbacks.create');
                break;
            case 3:
                session(['res1'=> $id]);
                return view('feedbacks.create');
                break;
            
            default:
               return view('inc.noSuchPage');
        }
        // session(['res1'=> $id]);
        // return view('feedbacks.create');
        
    }

   
    public function store(Request $request)
    {
        $str="Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36";
        $str1="127.0.0.1";
        $str2="khalailyt@gmail.com";

        // dd($id);
        $value = (float)session('res1');
        // $v=(float)$value;
        // dd($value);
       
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'phone'=>['required','regex:/^05[023458]-?[1-9]\d{6}$/'],
            // 'rateService'=>'required',
            // 'rateFood'=>'required',
            // 'rateSanitation'=>'required',
            // 'rateMusic'=>'required',
            'body'=>['required',
            'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
        ]);
          // Create Feedback
        $feedback = new Feedback;
        // dd($feedback->id);
        $feedback->fullName = $request->input('fullname');
        $feedback->email = $request->input('email');
        $feedback->phone = $request->input('phone');
        // $feedback->serviceRate=$request->input('rateService');
        // $feedback->foodRate=$request->input('rateFood');
        // $feedback->sanitationRate=$request->input('rateSanitation');
        // $feedback->musicRate=$request->input('rateMusic');
        $feedback->serviceRate=$request->rating;
        $feedback->foodRate=$request->rating_2;
        $feedback->sanitationRate=$request->rating_3;
        $feedback->musicRate=$request->rating_4;
        $feedback->body = $request->input('body');
        $feedback->restaurantID= $value;
        $feedback->userIP=$request->ip();
        $feedback->userAGENT=$request->server('HTTP_USER_AGENT');
        // dd($feedback->id);
       // $feedback->user_id=auth()->user()->id;
        $data =array(
            'fullname'=>$request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            // 'rateService' => $request->input('rateService'),
            // 'rateFood' => $request->input('rateFood'),
            // 'rateSanitation' => $request->input('rateSanitation'),
            // 'rateMusic' => $request->input('rateMusic'),
            'rateService' => $request->rating,
            'rateFood' => $request->rating_2,
            'rateSanitation' => $request->rating_3,
            'rateMusic' => $request->rating_4,
            'body' => $request->input('body'),
        );
        // $data =array(
        //     'rateService' => $request->rating,
        //     'rateFood' => $request->rating_2,
        //     'rateSanitation' => $request->rating_3,
        //     'rateMusic' => $request->rating_4,
        //     'body' => $request->input('body'),
        // );
        //SELECT * FROM news WHERE date > DATE_SUB(NOW(), INTERVAL 24 HOUR)
        //$feeCheck=DB::select("select * created_at from feedbacks where feedbacks.restaurantID='$v' and  feedbacks.email='$feedback->email' and created_at > ");
        //$timediff=$feedback->created_at - 
        
        $serviceChar=$this->getPoints($data['rateService']);
        $foodChar=$this->getPoints($data['rateFood']);
        $saniationChar =$this->getPoints($data['rateSanitation']);
        $musicChar=$this->getPoints($data['rateMusic']);

        $average=$this->getAverage( $serviceChar,$foodChar,$saniationChar,$musicChar);
        //  echo $average;
        $feedback->averageUser=$average;

        $now=Carbon::parse($feedback->created_at);
        // dd($now);
        //dd($now->diffInSeconds ($feedback->updated_at));
        $prev_date = new DateTime();
        $tz = new DateTimeZone('Asia/Jerusalem');
        $prev_date->setTimezone($tz);

        $prev_date->sub(new DateInterval('P1D'));
        $prev = $prev_date->format('Y-m-d H:i:s'); 
        $curr_date = new DateTime();
        $curr_date->setTimezone($tz);
        $curr = $curr_date->format('Y-m-d H:i:s');

        //SELECT something FROM tbl_name -> WHERE your_date_field > DATE_SUB(CURDATE(),INTERVAL 24 hour)

        // $check = DB::table('feedbacks')->select(DB::raw('count(email) as countEmail'))
        // ->whereRaw(" restaurantID='$value' and userIP='$feedback->userIP' and userAGENT='$feedback->userAGENT'and  '$now->diffInSeconds(created_at) > 86400' ")->get();

        $checkExistense=DB::select("select count(email) as count from feedbacks where restaurantID='$value' and  userIP='$feedback->userIP' and userAGENT='$feedback->userAGENT' and email='$feedback->email' and   created_at > '$prev' and created_at < '$curr'");
        //
       
        // date_default_timezone_set("Asia/Jerusalem");
         //$prev_date = date('Y-m-d H:i:s', strtotime($now .' -1 day'));
         $prev_date = new DateTime();
        $tz = new DateTimeZone('Asia/Jerusalem');
        $prev_date->setTimezone($tz);
        $prev_date->sub(new DateInterval('P1D'));
        //   $prev_date->format('Y-m-d H:i:s'); 
           
        //  dd($prev_date->format('Y-m-d H:i:s') );
        //DATEDIFF('$now',created_at)>=1
        //   $checkE=DB::select("select count(phone) as count from feedbacks where restaurantID='$value' and  userIP='$feedback->userIP' and userAGENT='$feedback->userAGENT' and email!='$feedback->email'and phone='$feedback->phone' and DATEDIFF('$now',created_at)<1");
        // dd($checkExistense);  
        //dd($checkE);
          // DATEDIFF('$now',created_at)>=1
         
        //   $isTrue=DB::select("select count(email) as count,created_at as a  from feedbacks where restaurantID='$value' and  userIP='$feedback->userIP' and userAGENT='$feedback->userAGENT' and email='$feedback->email'  group by (a)");
        //   $created_at=Carbon::parse($isTrue[0]->a);
        //   dd($now->diffInSeconds($created_at));

          $check=DB::select("select count(email) as count from feedbacks where restaurantID='$value' and email='$feedback->email' ");

          //$che=DB::select("select count(email) as count from  feedbacks where restaurantID='$value' and userIP='$feedback->userIP' and userAGENT='$feedback->userAGENT' and email!='$feedback->email' and DATEDIFF('$now',created_at)>=1 " );
          
          //dd($che[0]->count);
          //WHERE creation_date < DATE_SUB(NOW(),INTERVAL 15 MINUTE)
        //    dd($checkExistense[0]->count);
        // dd($check[0]->count);
          if($checkExistense[0]->count == 0 || $check[0]->count == 0){
             //and  DATEDIFF('$now',created_at)=1
            //dd('it has more than one row ');
            //DATEDIFF('$now',created_at)=1
            //DATEDIFF('$now',created_at)<1
            //$checkExistense[0]->count >= 1
            //$checkExistense[0]->count > 1

            // dd($checkExistense[0]->count);

        
        $token = new Token;
        $token->tokenName= $this->getToken();
        $token->usedToken="No";
        $token->restaurantID=$value;
    //    $token->fid=0;
        // date_default_timezone_set("Asia/Jerusalem");
        // $token->created_at= date_default_timezone_get();
        // $token->updated_at= date_default_timezone_get();
        $dt = new DateTime($token->created_at);

        

        $tz = new DateTimeZone('Asia/Jerusalem'); // or whatever zone you're after

        $dt->setTimezone($tz);
        $dt->format('Y-m-d H:i:s');  
        $token->created_at=$dt;
        
        $updated_at = new DateTime();
        $tz1 = new DateTimeZone('Asia/Jerusalem');
        
        $updated_at->setTimezone($tz1);
        $updated_at->format('Y-m-d H:i:s'); 
        $token->updated_at=$updated_at; 
        //$token->updated_at=$updated_at; 
       
       

        $feedback->body=strip_tags($feedback->body);
        $feedback->email=strip_tags($feedback->email);
        $feedback->fullName=strip_tags($feedback->fullName);
        $feedback->phone=strip_tags($feedback->phone);

       

        //   echo 'fullname:'.$feedback->fullName.'<br/>';
        //   echo 'email: '.$feedback->email.'<br/>';
        //   echo 'phone: '.$feedback->phone.'<br/>';
        //   echo 'ServiceRate: '.$feedback->serviceRate .'<br/>';
        //   echo 'FoodRate: '.$feedback->foodRate.'<br/>';
        //   echo 'SanitationRate: '.$feedback->sanitationRate.'<br/>';
        //   echo 'musicRate: '.$feedback->musicRate.'<br/>';
        //Mail::to( $feedback->email)->send(new email($feedback));
        
      

        // return redirect($feedback->id);
        //  dd($feedback->email);
         $googleToken=$request->input('g-recaptcha-response');

        if(strlen($googleToken)>0){
            $client =new Client(); 
            $response=$client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params'=> array(
                'secret'=>'6LelSHUUAAAAADl07LuZp02zQj8uNMtk3N1u-Mp8',
                'response'=>$googleToken

            )
            
            ]);
           $result = json_decode( $response->getBody()->getContents());
           if($result->success){
           
                Mail::to( $feedback->email)->send(new sched($token));
        
                if($average<35.0){
                Mail::to('khalailyt@gmail.com')->send(new email($feedback));
                }
                $token->save(['timestamps' => false]);
                $feedback->save();
            return redirect('/success')->with('success', 'Feedback Created');

           }
           else{return view('inc.redirect');}
        }
        else{return view('inc.redirect');}
     }
     else{return view('inc.duplicateSubmission');}

         //   dd($request->ip(),$request->server('HTTP_USER_AGENT'),$feedback->created_at,$feedback->email );
        // dd($googleToken);
        // if($request->ip()!=$str1 && $request->server('HTTP_USER_AGENT')!=$str){
            
        // }
        // else {
        //     dd('you cant do this again');
        // }
        

        // dd($request->ip(),$request->server('HTTP_USER_AGENT'),$feedback->created_at,$feedback->email );
        // dd($request->server('HTTP_USER_AGENT') );
        // dd($feedback->created_at);
        // dd($feedback->email);
       

        //   $x=$request->server('HTTP_USER_AGENT');
        //   if ($request->server('HTTP_USER_AGENT')==$x){
        //       dd('killitbabe');
        //   }
        //   dd($x);
          

        //   date_default_timezone_set("Asia/Jerusalem");
        //   $dateH= date("h");
        //   $dateM= date("i");
          

        //   $dateHour=(int)$dateH;
        //   $dateMin=(int)$dateM;

        
        // if($dateHour>=4 && $dateMin>=0 && $dateHour<5 &&  $dateMin<59){
        // $feedbacks = DB::table('feedbacks')->select(DB::raw('*'))
        // ->whereRaw('Date(created_at) = CURDATE()')->get();
        // Mail::to('asics17g@gmail.com')->send(new SendMailable($feedbacks));
        // }
        //dd($average);
          
        //   return view('inc.success'); 
    }

   
    public function show($id)
    {
        $feedback = Feedback::find($id);
        //return Post::find($id);
        return view('feedbacks.show')->with('feedback',  $feedback);
    }
    public function ip()
    {
        // return $this->getClientIps(); //original method
        return $this->getIp(); // the above method
    }
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
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

//    public function getPoints($letter){        
//     switch ($letter) 
//     {
//         case "A":
//             //echo "A!";
//             return 100;
//             break;
//         case "B":
//            // echo "B!";
//             return 80;
//             break;
//         case "C":
//             //echo "C!";
//             return 60;
//             break;
//         case "D":
//             //echo "D!";
//             return 40;
//             break;
//         case "E":
//             //echo "E!";
//             return 20;
//             break;
//         default:
//             echo "Error";
//     }            
// }
public function getAverage($a,$b,$c,$d){
    $sum=$a+$b+$c+$d;
    return (float)$sum/4;


}
public function getToken(){
    
    $random_string = md5(microtime());

    return $random_string;


}


   
    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
    }

  
    public function destroy($id)
    {
        
    }
}
