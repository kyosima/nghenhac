<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [HomeController::class, 'getLogin']);
    Route::post('/login', [HomeController::class, 'postLogin']);
    Route::get('/register', [HomeController::class, 'getRegister']);
    Route::post('/register', [HomeController::class, 'postRegister']);
});



//ADMIN
Route::group(['prefix' => '/', 'middleware' => 'admin'], function(){
    Route::get('/dashboard', [AdminController::class, 'getDashboard']);
    Route::get('/danh-sach', [AdminController::class, 'getDanhsach']);
    Route::get('/ho-so', [AdminController::class, 'getHoso']);
    Route::get('/them-nguoi-dung', [AdminController::class, 'getThemnguoidung']);
    Route::get('/danh-sach-video', [AdminController::class, 'getDanhsachvideo']);
});

Route::get('/logout', [HomeController::class, 'logout']);
