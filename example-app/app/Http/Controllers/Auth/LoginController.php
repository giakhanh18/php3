<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(Request $request){
        if($request->isMethod('post')){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('route_phong_index');
            }else{
              Session::flash('error','sai mk hoac email');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
