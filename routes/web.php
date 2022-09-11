<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\Auth\CustomLoginController;
/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::group(['middleware' => 'guest'] , function () {
    Route::get('/', function () {
        return view('student.home');
    });

    Route::get('home',function () {
        return view('student.home');
    })->name('home');

    Route::get('register',[CustomLoginController::class,'showRegisterForm'])->name('student.register');
    Route::get('login',[CustomLoginController::class,'showLoginForm'])->name('student.login');
});


Route::group(['middleware' => 'auth:web' ], function() {

});

