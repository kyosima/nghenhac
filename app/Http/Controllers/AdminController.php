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
    public function getDanhsach(){
        return view('admin.danhsachnguoidung');
    }
    public function getHoso(){
        return view('admin.profile');
    }
    public function getThemnguoidung(){
        return view('admin.themnguoidung');
    }
    public function getDanhsachvideo(){
        return view('admin.danhsachvideo');
    }


}
