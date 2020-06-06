<?php

namespace Servicio\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Servicio\Token;
use Illuminate\Support\Carbon;
class TokenValidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view ('inc.token');
       
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

    public function store(Request $request)
    {
        $token=$request->input('tokenStr');
       $isTrue=DB::select("select count(id) as count,created_at as a  from tokens where tokenName='$token'  group by (a)");
        $created_at=Carbon::parse($isTrue[0]->a);
        $now =Carbon::now();
        if($now->diffInSeconds($created_at)>86400){
            $isTrueF=DB::select("select count(id) as count from tokens where tokenName='$token'");
            if($isTrueF[0]->count==1 ){
                return view('inc.valid');
     
            }
            else {return view('inc.unvalid');}
         }
         return view('inc.unvalid');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

  
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
    public function getID($code){
        session(['code'=> $code]);
        return view ('inc.token');
    }
}
