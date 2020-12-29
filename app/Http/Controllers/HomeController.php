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
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            if($user->role == 0){
                if($user->status == 1){
                    return redirect('admin/dashboard');
                }
                else{
                    Auth::logout();
                    return back()->with('kichhoat', 'Tài khoản chưa được kích hoạt');
                }
            }
            elseif($user->role == 1){
                if($user->status == 1){
                    return "Trang user role 1";
                }
                else{
                    Auth::logout();
                    return back()->with('kichhoat', 'Tài khoản chưa được kích hoạt');
                }
            }
            elseif($user->role == 2){
                if($user->status == 1){
                    return "Trang user role 2";
                }
                else{
                    Auth::logout();
                    return back()->with('kichhoat', 'Tài khoản chưa được kích hoạt');
                }
            }
            elseif($user->role == 3){
                if($user->status == 1){
                    return "Trang user role 3";
                }
                else{
                    Auth::logout();
                    return back()->with('kichhoat', 'Tài khoản chưa được kích hoạt');
                }
            }

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
        Auth::logout();
        return redirect('/');
    }
}
