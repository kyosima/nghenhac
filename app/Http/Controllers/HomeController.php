<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('public.index');

    }
    public function getLogin(){
        return view('public.login');
    }
    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        if($username == "kyosima" && $password == "123456"){
            return redirect('/dashboard');
        }
        else{
            $request->session()->flash('dangnhaploi', 'Tài khoản hoặc mật khẩu không đúng!');

            return redirect('/login');
        }
    }

    public function getRegister(){
        return view('public.register');
    }
}
