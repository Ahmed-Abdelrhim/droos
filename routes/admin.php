<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\CustomLoginController;
use  App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' =>'guest:admin'] , function () {
    Route::get('admin/login',[CustomLoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('admin/login',[CustomLoginController::class,'login'])->name('admin.login');
    Route::get('admin/logout',[CustomLoginController::class,'logout']);
});

Route::group(['middleware' =>'auth:admin'],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('teachers',[DashboardController::class,'showTeachers']);

});
