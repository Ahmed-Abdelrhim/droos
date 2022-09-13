<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\Auth\CustomLoginController;
use App\Http\Controllers\Student\AcademicFirstYear;
use App\Http\Controllers\Student\AcademicSecondYear;
use App\Http\Controllers\Student\AcademicThirdYear;
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
//Auth::routes();

Route::group(['middleware' => 'guest'] , function () {
    Route::get('/', function () {
        return view('student.home');
    });
    Route::get('register',[CustomLoginController::class,'showRegisterForm'])->name('student.register');
    Route::post('register',[CustomLoginController::class,'registerStudent'])->name('store.student');

    Route::get('login',[CustomLoginController::class,'showLoginForm'])->name('student.login');
    Route::post('login',[CustomLoginController::class,'login'])->name('login.student');
});
Route::get('hash',function() {
    return bcrypt('123456');
});

Route::get('home',function () {
    return view('student.home');
})->name('home');


Route::group(['middleware' => 'auth:web' ], function() {
    Route::get('logout',[CustomLoginController::class,'logout'])->name('logout');

    Route::get('secondary/first/year',[AcademicFirstYear::class,'index'])->name('academic_first_years');
    Route::get('secondary/second/year',[AcademicSecondYear::class,'index'])->name('academic_second_years');
    Route::get('secondary/third/year',[AcademicThirdYear::class,'index'])->name('academic_third_years');
});

