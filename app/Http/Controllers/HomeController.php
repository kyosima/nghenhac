<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('public.index');

    }

    public function getLogin(){
        return view('public.login');
    }

    public function postLogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::guard('user')->attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::guard('user')->user();
            // if($user->role == 0){
            //     Auth::guard('admin')->attempt(['username' => $username, 'password' => $password]);
            //     return redirect('admin/dashboard');
            // }
            return redirect('/');
        }else{
            return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function getRegister(){
        return view('public.register');
    }

    public function postRegister(Request $request){
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $role = $request->role;
        $password = $request->password;
        $file = $request->file('bill');
        $file->move('public/customer/image/bill', $file->getClientOriginalName());
        $checkUserAvailable = DB::table('users')->where('username', $username)->first();
        if($checkUserAvailable == null){
            DB::table('users')->insert(['username'=>$username, 'fullname'=>$fullname, 'email'=>$email, 'role'=>$role, 'password' => Hash::make($password)]);
            DB::table('upgrate')->insert(['ofuser'=>$username, 'bill'=>$file->getClientOriginalName()]);
            return redirect('/login')->with('success', 'Bạn đã đăng ký thành công, vui lòng đợi chúng tôi duyệt tài khoản và đăng nhập');
        }else{
            return back()->with('error', 'Tài khoản đã tồn tại');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
