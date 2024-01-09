<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function ___construct(){
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
                return $user;
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
