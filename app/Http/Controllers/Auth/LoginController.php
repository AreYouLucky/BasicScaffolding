<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        //return $request;

        $credentials = $request->validate(
            [
                'email'=>['required'],
                'password'=>['required'],
            ]
            );
            //pero ug dika mogamit guard, si web ang gamiton
            if(Auth::attempt($credentials)){ //ang query nia is select * from studentmodel where username = ? and pass = ?
                $request->session()->regenerate();

                $user = Auth::user();
                return redirect('/admin-dashboard')
                ->with('user',$user);
            }
            return response()->json([
                'errors' => [
                    'username' =>['Invalid Credentials']
                ]
            ], 422);
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/');
    }



}
