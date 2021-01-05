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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::guard('user')->attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::guard('user')->user();
            $statistical = DB::table('statistical')->where('ofuser', $user->username)->first();
            $today = date("Y/m/d");
            $role = DB::table('role')->where('ofrole', $user->role)->first();
            if(strtotime($today) != strtotime($statistical->today)){
                DB::table('statistical')->where('ofuser', $user->username)->update(['today'=> $today, 'count_video' => $role->quantity_video]);
            }
            if($user->status == 1){
                if($user->role == 0){
                    if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                        return redirect('/admin/dashboard');
                    }
                }else{
                    return redirect('/dashboard');
                }
            }elseif($user->status == 2){
                Auth::guard('user')->logout();
                Auth::guard('admin')->logout();
                return back()->with('error', 'Tài khoản đã bị khoá');
            }else{
                Auth::guard('user')->logout();
                Auth::guard('admin')->logout();
                return back()->with('error', 'Tài khoản chưa được kích hoạt');
            }
           
          

        }else{
            return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }


    public function getRegister(){
        return view('public.register');
    }

    public function postRegister(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Y/m/d");
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $role = $request->role;
        $password = $request->password;
        if($role == 1){
            $amount = 200000;
        }elseif($role==2){
            $amount = 400000;
        }else{
            $amount = 600000;
        }
        $file = $request->file('bill');
        $file->move('public/customer/image/bill', $file->getClientOriginalName());
        $checkUserAvailable = DB::table('users')->where('username', $username)->first();
        $package = DB::table('role')->where('ofrole', $role)->first();
        if($checkUserAvailable == null){
            DB::table('users')->insert(['username'=>$username, 'fullname'=>$fullname, 'email'=>$email, 'role'=>$role, 'password' => Hash::make($password)]);
            DB::table('upgrate')->insert(['ofuser'=>$username, 'bill'=>$file->getClientOriginalName(),'amount'=> $amount, 'status'=>0]);
            DB::table('statistical')->insert(['ofuser'=>$username, 'count_video'=>$package->quantity_video,'today'=>$today]);
            DB::table('bank')->insert(['ofuser'=>$username]);

            return redirect('/login')->with('success', 'Bạn đã đăng ký thành công, vui lòng đợi chúng tôi duyệt tài khoản và đăng nhập');
        }else{
            return back()->with('error', 'Tài khoản đã tồn tại');
        }
    }

    public function logout(){
        Auth::guard('user')->logout();
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
