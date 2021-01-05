<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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

//USER
Route::group(['middleware' => 'user'], function(){
    Route::get('/dashboard', [UserController::class, 'getDashboard']);
    Route::get('/account', [UserController::class, 'getAccount']);
    Route::post('/account', [UserController::class, 'postEditAccount']);
    Route::get('/bank', [UserController::class, 'getBank']);
    Route::post('/bank', [UserController::class, 'postEditBank']);
    Route::get('/list-video', [UserController::class, 'getListVideo']);
    Route::get('/upgrate', [UserController::class, 'getUpgrate']);
    Route::get('/upgrate/{package}', [UserController::class, 'getUpgratePackage']);
    Route::post('/upgrate/{package}', [UserController::class, 'postUpgrateDeposit']);
    Route::get('/withdrawn', [UserController::class, 'getWithdrawn']);
    Route::post('/withdrawn', [UserController::class, 'postWithdrawn']);
    Route::get('/withdrawn-history', [UserController::class, 'getWithdrawnHistory']);
    Route::get('/deposit-history', [UserController::class, 'getDepositHistory']);
    Route::get('/change-password', [UserController::class, 'getChangePassword']);
    Route::post('/change-password', [UserController::class, 'postChangePassword']);
    Route::get('/video/{id_video}', [UserController::class, 'getVideo']);
    Route::get('/video/complete/{id_video}', [UserController::class, 'getCompleteVideo']);
});

//ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/dashboard', [AdminController::class, 'getDashboard']);
    Route::get('/list-user', [AdminController::class, 'getListUser']);
    Route::get('/list-admin', [AdminController::class, 'getListAdmin']);
    Route::get('/list-new-user', [AdminController::class, 'getListNewUser']);
    Route::get('/view-user/{id_user}', [AdminController::class, 'getUserDetail']);
    Route::post('/view-user/{id_user}', [AdminController::class, 'postEditDetailUser']);
    Route::post('/viewuser/changepass', [AdminController::class, 'postChangePasswordUser']);
    Route::get('/add-user', [AdminController::class, 'getAddUser']);
    Route::post('/add-user', [AdminController::class, 'postAddUser']);
    Route::get('/add-video', [AdminController::class,'getAddVideo']);
    Route::post('/add-video', [AdminController::class,'postAddVideo']);
    Route::get('/delete-video/{id_video}', [AdminController::class,'deleteVideo']);
    Route::get('/delete-all-video', [AdminController::class,'deleteAllVideo']);
    Route::get('/list-video', [AdminController::class, 'getListVideo']);
    Route::get('/kichhoat', [AdminController::class, 'kichhoat']);
    Route::get('/khoa', [AdminController::class, 'khoa']);
    Route::get('/deposit-manager', [AdminController::class, 'getDepositManager']);
    Route::get('/withdrawn-manager', [AdminController::class, 'getWithdrawnManager']);
    Route::get('/cancel-deposit', [AdminController::class, 'cancelDeposit']);
    Route::get('/accept-deposit', [AdminController::class, 'acceptDeposit']);
    Route::get('/cancel-withdrawn', [AdminController::class, 'cancelWithdrawn']);
    Route::get('/accept-withdrawn', [AdminController::class, 'acceptWithdrawn']);
    Route::get('/deposit-history', [AdminController::class, 'getDepositHistory']);
    Route::get('/withdrawn-history', [AdminController::class, 'getWithdrawnHistory']);
    Route::get('/change-password', [AdminController::class, 'getChangePassword']);
    Route::post('/change-password', [AdminController::class, 'postChangePassword']);

});

Route::get('/logout', [HomeController::class, 'logout']);
