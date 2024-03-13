<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function Get(){
        $title = 'Masuk';
        return view('auth.login',compact('title'));
    }
    public function Post(Request $request){
        $val = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            if (Auth::attempt($request->only('email','password'))) {
                return redirect()->intended('/');
            } else {
                return redirect()->back()->with('gagal','Email atau password salah');
            }
            
        }
        
    }
    public function Logout(){
        Auth::logout();
        return redirect('masuk');
    }
}
