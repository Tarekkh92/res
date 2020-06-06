<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Servicio\Token;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
         App::setLocale(Session::get('applocale'));
         $v=session('res1');
        $tokens = DB::table('tokens')->select(DB::raw('*'))
        ->whereRaw("restaurantID='$v'")->get();

        // $feedbacks=DB::select('SELECT id,fullName,email,phone,serviceRate,foodRate,sanitationRate,musicRate,body,created_at,updated_at FROM feedbacks');
        return view('tokens.index')->with('tokens',$tokens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('tokens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = new Token;
       // $token->tokenName=$request->input('tokenName');
        $token->usedToken=$request->input('used Token');
        $updated_at = new DateTime($token->updated_at);
        $tz = new DateTimeZone('Asia/Jerusalem');
        
        $updated_at->setTimezone($tz);
        $updated_at->format('Y-m-d H:i:s'); 
        $token->updated_at=$updated_at; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $token = Token::find($id);
        // return view('tokens.edit')->with('token', $token);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = Token::find($id);
        return view('tokens.edit')->with('token', $token);
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
        $this->validate($request, [
            'usedToken'=>['required','regex:/^(?:Yes|No)$/'],
    
        ]);
        $token = Token::find($id);
        $token->usedToken=$request->input('usedToken');
        $updated_at = new DateTime();
        $tz1 = new DateTimeZone('Asia/Jerusalem');
        
        $updated_at->setTimezone($tz1);
        $updated_at->format('Y-m-d H:i:s'); 
        $token->updated_at=$updated_at; 
        $token->save(['timestamps' => false]);
        return redirect('/tokens')->with('success','Token Updated');
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
