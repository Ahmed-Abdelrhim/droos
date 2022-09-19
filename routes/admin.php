<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\CustomLoginController;
use  App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;

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

//Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form')->middleware('guest:author');
//Route::post('admin/asdasdasdasdsadasdasdasdas/login', [AdminLoginController::class, 'login'])->name('signIn');
//Route::get('admin/logout', [AdminLoginController::class, 'logout']);
//
//Route::group(['middleware' => 'auth:author'], function () {
////    Route::post('logout',[AdminLoginController::class,'logout']);
//
//    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//
//    Route::get('admin/teachers', [DashboardController::class, 'showTeachers'])->name('teachers');
//});



//Route::get('admin/play', [DashboardController::class, 'play']);
