<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function getDashboard(){
        $user = Auth::guard('user')->user();
        return view('user.dashboard', ['user'=>$user]);
    }
    public function getAccount(){
        $user = Auth::guard('user')->user();
        return view('user.userdetail', ['user'=>$user]);
    }
    
    public function postEditAccount(Request $request){
        $user = Auth::guard('user')->user();
        $fullname = $request->fullname;
        $email = $request->email;
        DB::table('users')->where('id', $user->id)->update(['fullname'=>$fullname, 'email'=>$email]);
        return back()->with('success','Cập nhật thông tin thành công');
    }

    public function getBank(){
        $user = Auth::guard('user')->user();
        $bank = DB::table('bank')->where('ofuser', $user->username)->first();
        return view('user.bank', ['bank'=>$bank]);
    }
    
    public function postEditBank(Request $request){
        $user = Auth::guard('user')->user();
        $bank_bankname = $request->bank_bankname;
        $bank_username = $request->bank_username;
        $bank_banknumber = $request->bank_banknumber;
        DB::table('bank')->where('ofuser', $user->username)->update(['bankname'=>$bank_bankname, 'username'=>$bank_username, 'banknumber'=>$bank_banknumber]);
        return back()->with('success', 'Cập nhật thông tin ngân hàng thành công');
    }

    public function getChangePassword(Request $request){
            $user = Auth::guard('user')->user();
            return view('user.changepassword');
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

    public function getListVideo(){
        $user = Auth::guard('user')->user();
        $role = DB::table('role')->where('ofrole', $user->role)->first();
        $statistical = DB::table('statistical')->where('ofuser',$user->username)->first();

        $videos = DB::table('video')->get();
        for($i = 0;$i < count($videos); $i++){
            foreach (explode(",", $videos[$i]->viewer) as $val) {
                if($user->id == $val){
                    unset($videos[$i]);
                }
            }
        }
        return view('user.listvideo',['videos'=>$videos,'statistical'=>$statistical]);
    }

    public function getVideo(Request $request){
        $id_video = $request->id_video;
        $video = DB::table('video')->where('id',$id_video)->first();
        return view('user.video',['video'=>$video]);
    }

    public function getCompleteVideo(Request $request){
        $user = Auth::guard('user')->user();
        $id_video = $request->id_video;
        $video = DB::table('video')->where('id',$id_video)->first();
        $statistical = DB::table('statistical')->where('ofuser',$user->username)->first();
        $tags = explode(',',$video->viewer);
        foreach ($tags as $val) {
            if($user->id == intval($val)){
                return redirect('/list-video')->with('error','Bạn đã xem video này rồi');
            }
        }
        if($statistical->count_video > 0){
            DB::table('video')->where('id',$id_video)->update(['viewer'=>$video->viewer.','.$user->id]);
            DB::table('users')->where('id',$user->id)->update(['wallet'=>$user->wallet+10000]);
            DB::table('statistical')->where('ofuser',$user->username)->update(['count_video'=>$statistical->count_video-1]);
        }else{
            redirect('/list-video')->with('error','Bạn đã hết lượt xem ngày hôm nay');
        }
        return redirect('/list-video')->with('success','Xem video nhận thưởng thành công, xem video khác để tiếp tục nhận tiền nhé');
    }


    public function getUpgrate(){
        $user = Auth::guard('user')->user();
        return view('user.upgrate');
    }

    public function getUpgratePackage(Request $request){
        $user = Auth::guard('user')->user();
        $name_package = $request->package;
        $package_upgrate = DB::table('role')->where('package', $name_package)->first();
        $role = DB::table('role')->where('ofrole', $user->role)->first();
        $upgrate = DB::table('upgrate')->where('ofuser',$user->username)->where('status', 0)->first();
        if($upgrate != null){
            return back()->with('error', 'Bạn đang có 1 lệnh nâng cấp chưa được duyệt, vui lòng thử lại sau');
        }else{
            if($role->ofrole >= $package_upgrate->ofrole){
                return back()->with('error', 'Gói của bạn cao hơn');
            }else{
                return view('user.upgrate_deposit', ['package_upgrate'=> $package_upgrate,'role'=>$role]);        
            }
        }
    }

    public function postUpgrateDeposit(Request $request){
        $user = Auth::guard('user')->user();
        $amount = $request->amount;
        $role = $request->role;
        $file = $request->file('bill');
        $file->move('public/customer/image/bill', $file->getClientOriginalName());
        DB::table('upgrate')->insert(['ofuser'=> $user->username, 'amount'=> $amount, 'bill'=>$file->getClientOriginalName(),'role'=>$role, 'status'=>0]);
        return back()->with('success','Bạn đã đặt lệnh nâng cấp thành công, chúng tôi sẽ duyệt lệnh nhanh nhất có thể, xin cảm ơn!');        
    }

    public function getWithdrawn(){
        $user = Auth::guard('user')->user();
        $bank = DB::table('bank')->where('ofuser', $user->username)->first();
        return view('user.withdrawn', ['bank'=>$bank]);
    }

    public function postWithdrawn(Request $request){
        $user = Auth::guard('user')->user();
        $amount = $request->amount;
        if($amount > $user->wallet){
            return back()->with('error', 'Số dư của bạn không đủ');
        }else{
            DB::table('users')->where('username', $user->username)->update(['wallet'=>$user->wallet-$amount]);
            DB::table('withdrawn')->insert(['ofuser'=> $user->username, 'amount'=>$amount, 'status'=>0]);
            return back()->with('success', 'Bạn đã đặt lệnh rút thành công, chúng tôi sẽ duyệt lệnh nhanh nhất có thể');
        }
    }

    public function getWithdrawnHistory(){
        $user = Auth::guard('user')->user();
        $withdrawns = DB::table('withdrawn')->where('ofuser', $user->username)->orderBy('id','desc')->get();
        return view('user.withdrawn_history', ['withdrawns'=>$withdrawns]);
    }

    public function getDepositHistory(){
        $user = Auth::guard('user')->user();
        $deposits = DB::table('upgrate')->where('ofuser', $user->username)->orderBy('id','desc')->get();
        return view('user.deposit_history', ['deposits'=>$deposits]);
    }


}
