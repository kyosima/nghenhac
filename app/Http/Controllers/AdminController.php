<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function getDashboard(){
        return view('admin.dashboard');

    }
    public function getListUser(){
        $users = DB::table('users')->where('role','<>',0)->orderBy('id', 'desc')->get();
        return view('admin.listuser', ['users'=>$users]);
    }
    public function getListAdmin(){
        $users = DB::table('users')->where('role','==',0)->orderBy('id', 'desc')->get();
        return view('admin.listadmin', ['users'=>$users]);
    }
    public function getListNewUser(){
        $users = DB::table('users')->where('role','<>',0)->where('status','==',0)->orderBy('id', 'desc')->get();
        return view('admin.listnewuser', ['users'=>$users]);
    }

    public function kichhoat(){
        $id_user = $_GET['id'];
        DB::table('users')->where('id', $id_user)->update(['status'=>1]);
        $user = DB::table('users')->where('id', $id_user)->first();
        DB::table('upgrate')->where('ofuser', $user->username)->update(['status'=>1]);
        return 'kich hoat thanh cong';
    }
    public function khoa(){
        $id_user = $_GET['id'];
        $user = DB::table('users')->where('id', $id_user)->first();
        DB::table('upgrate')->where('ofuser', $user->username)->update(['status'=>2]);
        DB::table('users')->where('id', $id_user)->update(['status'=>2]);
        return 'khoa thanh cong';
    }
    public function getUserDetail(Request $request){
        $id_user = $request->id_user;
        $user = DB::table('users')->where('id', $id_user)->first();
        return view('admin.userdetail', ['user'=>$user]);
    }
    public function postEditDetailUser(Request $request){
        $id_user = $request->id;
        $fullname = $request->fullname;
        $email = $request->email;
        $wallet = $request->wallet;
        $status = $request->status;
        $role = $request->role;
        DB::table('users')->where('id', $id_user)->update(['fullname'=>$fullname, 'email'=>$email, 'wallet'=>$wallet, 'status'=>$status, 'role'=>$role]);
        return back()->with('success', 'Cập nhật thông tin thành công');
    }
    public function postChangePasswordUser(Request $request){
        $id_user = $request->id;
        DB::table('users')->where('id', $id_user)->update(['password'=> Hash::make($request->newpassword)]);
        return back()->with('success', 'Cập nhật mật khẩu thành công');
    }
    public function getAddUser(){
        return view('admin.adduser');
    }
    public function postAddUser(Request $request){
        $username = $request->username;
        $fullname = $request->fullname;
        $wallet = $request->wallet;
        $email = $request->email;
        $wallet = $request->wallet;
        $status = $request->status;
        $role = $request->role;
        $password = $request->password;
        DB::table('users')->insert(['username'=>$username, 'wallet'=>$wallet,'fullname'=>$fullname, 'email'=>$email, 'wallet'=>$wallet, 'status'=>$status, 'role'=>$role, 'password'=>Hash::make($password)]);
        return back()->with('success', 'Thêm thành viên thành công');
    }

    public function getAddVideo(){
        return view('admin.addvideo');
    }

    public function postAddVideo(Request $request){
        list($before, $after) = explode("?v=", $request->link);
        $name = $request->name;
        DB::table('video')->insert(['name'=>$name, 'link'=>$after]);
        return back()->with('success', 'Thêm video thành công');
    }

    public function getListVideo(){
        $videos = DB::table('video')->paginate(10);
        return view('admin.listvideo',['videos'=>$videos]);
    }

    public function deleteVideo(Request $request){
        $id_video = $request->id_video;
        DB::table('video')->where('id', $id_video)->delete();
        return back()->with('success','Xoá video thành công');
    }

    public function deleteAllVideo(Request $request){
        DB::table('video')->truncate();
        return back()->with('success', 'Đã xoá toàn bộ video');

    }

    public function getDepositManager(){
        $deposits = DB::table('upgrate')->where('status', 0)->orderBy('id','desc')->get();
        return view('admin.deposit_manager',['deposits'=>$deposits]);
    }

    public function cancelDeposit(){
        $id_dep = $_GET['id'];
        $deposit = DB::table('upgrate')->where('id',$id_dep)->first();
        DB::table('upgrate')->where('id', $id_dep)->update(['status'=>2]);
        return 'huy lenh nap';
    }
    public function acceptDeposit(){
        $id_dep = $_GET['id'];
        $deposit = DB::table('upgrate')->where('id',$id_dep)->first();
        $user = DB::table('users')->where('username', $deposit->ofuser)->first();
        DB::table('upgrate')->where('id', $id_dep)->update(['status'=>1]);
        DB::table('users')->where('username', $deposit->ofuser)->update(['role'=>$deposit->role]);
        return 'duyet thanh cong';
    }
    public function getWithdrawnManager(){
        $withdrawns = DB::table('withdrawn')->where('status', 0)->orderBy('id','desc')->get();
        return view('admin.withdrawn_manager',['withdrawns'=>$withdrawns]);
    }

    public function cancelWithdrawn(){
        $id_with = $_GET['id'];
        DB::table('withdrawn')->where('id', $id_with)->update(['status'=>2]);
        return 'huy lenh rut';
    }
    public function acceptWithdrawn(){
        $id_with = $_GET['id'];
        DB::table('withdrawn')->where('id', $id_with)->update(['status'=>1]);
        return 'duyet lenh rut';
    }

    public function getWithdrawnHistory(){
        $withdrawns = DB::table('withdrawn')->where('status','<>', 0)->orderBy('id','desc')->get();
        return view('admin.withdrawn_history',['withdrawns'=>$withdrawns]);
    }

    public function getDepositHistory(){
        $deposits = DB::table('upgrate')->where('status','<>', 0)->orderBy('id','desc')->get();
        return view('admin.deposit_history',['deposits'=>$deposits]);
    }
    public function getChangePassword(Request $request){
        $user = Auth::guard('user')->user();
        return view('admin.changepassword');
    }

    public function postChangePassword(Request $request){
        $user = Auth::guard('user')->user();
        $password = $request->password;
        $oldpassword = $request->oldpassword;
        if (Hash::check($oldpassword, $user->password)) {
            DB::table('users')->where('id', $user->id)->update(['password'=> Hash::make($password)]);
            return back()->with('success','Cập nhật mật khẩu thành công');

        }else{
            return back()->with('error','Sai mật khẩu cũ');
        }
    }

}
