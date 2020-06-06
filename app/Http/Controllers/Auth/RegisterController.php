<?php

namespace Servicio\Http\Controllers\Auth;

use Servicio\User;
use Servicio\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        App::setLocale(Session::get('applocale'));
        // dd(Session::get('applocale'));
       $this->middleware('auth');
         
        //  dd(Session::get('applocale'));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'restaurantID'=>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Servicio\User
     */
    protected function create(array $data)
    {
         //  App::setLocale(Session::get('applocale'));
        //  dd(Session::get('applocale'));
        $v=session('res1');
        $rid=auth()->user()->restaurantID;
        if($rid != $data['userType']){
            // alert('You cant Add This user');
            // dd('You cant Add This user');
           

              throw new \Exception("Unauthorized Registration");
             //??? change to something nice
            // return redirect('/error')->with('error', 'No Auth');
            //  return redirect('/');
        }
        else{
        // dd($v);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'restaurantID'=>$rid,
            // 'userType' => $request->input('userType'),
           

          
            'restaurantID'=>$data['userType'],
            
            //dd($request->input('userType')),
        ]);
        }
    }
}
