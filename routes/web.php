<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\Auth\CustomLoginController;
use App\Http\Controllers\Student\AcademicFirstYear;
use App\Http\Controllers\Student\AcademicSecondYear;
use App\Http\Controllers\Student\AcademicThirdYear;
use App\Http\Controllers\StudentGeneralController;
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

Route::group(['middleware' => 'disable_back_btn'],function () {
    Route::group(['middleware' => 'guest:web'] , function () {
        Route::get('/', function () {
            return view('student.home');
        });
        Route::get('register',[CustomLoginController::class,'showRegisterForm'])->name('student.register');
        Route::post('register',[CustomLoginController::class,'registerStudent'])->name('store.student');

        Route::get('login',[CustomLoginController::class,'showLoginForm'])->name('student.login');
        Route::post('login',[CustomLoginController::class,'login'])->name('login.student');

        Route::get('courses/1st/year',[AcademicFirstYear::class,'courses'])->name('courses.1st');
        Route::get('courses/2nd/year',[AcademicSecondYear::class,'courses'])->name('courses.2nd');
        Route::get('courses/3rd/year',[AcademicThirdYear::class,'courses'])->name('courses.3rd');
    });
    Route::get('hash',function() {
        return bcrypt('12345678');
    });

    Route::get('home',function () {
        return view('student.home');
    })->name('home');


    Route::group(['middleware' => 'auth:web' ], function() {
        Route::get('logout',[CustomLoginController::class,'logout'])->name('logout');
        Route::get('secondary/first/year',[AcademicFirstYear::class,'index'])->name('academic_first_years');
        Route::get('secondary/second/year',[AcademicSecondYear::class,'index'])->name('academic_second_years');
        Route::get('secondary/third/year',[AcademicThirdYear::class,'index'])->name('academic_third_years');

        Route::get('about',function (){
            return view('student.about');
        })->name('about');

        Route::get('contact',function (){
            return view('student.contact');
        })->name('contact');

        Route::get('course',function (){
            return view('student.courses');
        })->name('course');
        Route::post('message',[StudentGeneralController::class,'storeMessage'])->name('msg');

        Route::get('first/year', [AcademicFirstYear::class,'index'])->name('1st.year');
        Route::get('second/year',[AcademicSecondYear::class,'index'])->name('2nd.year');
        Route::get('third/year', [AcademicThirdYear::class,'index'])->name('3rd.year');




        Route::get('playlist',function (){
            return view('student.playlist');
        })->name('playlist');
    });

    Route::get('aaa',[StudentGeneralController::class,'play']);
    Route::get('admin/play', [DashboardController::class, 'play']);



    Route::group(['middleware' => 'guest:admin'],function() {
        Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
        Route::post('admin/post/login', [AdminLoginController::class, 'login'])->name('signIn');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('admin/logout', [AdminLoginController::class, 'logout']);

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('admin/teachers', [DashboardController::class, 'showTeachers'])->name('teachers');

        Route::get('student_1st_year',[DashboardController::class,'studentsFirstYear'])->name('student_1st_year');
        Route::get('student_2nd_year',[DashboardController::class,'studentsSecondYear'])->name('student_2nd_year');
        Route::get('student_3rd_year',[DashboardController::class,'studentsThirdYear'])->name('student_3rd_year');

        Route::get('admin/courses/1st/year',[DashboardController::class,'CourseFirstYear'])->name('admin.courses.1st');
        Route::get('admin/courses/2nd/year',[DashboardController::class,'CourseSecondYear'])->name('admin.courses.2nd');
        Route::get('admin/courses/3rd/year',[DashboardController::class,'CourseThirdYear'])->name('admin.courses.3rd');

        Route::get('waiting_list_1st_year',[DashboardController::class,'waitingListFirstYear'])->name('waiting_list_1st_year');
        Route::get('waiting_list_2nd_year',[DashboardController::class,'waitingListSecondYear'])->name('waiting_list_2nd_year');
        Route::get('waiting_list_3rd_year',[DashboardController::class,'waitingListThirdYear'])->name('waiting_list_3rd_year');

        Route::get('subscribed_1st_year',[DashboardController::class,'subscribedFirstYear'])->name('subscribed_1st_year');
        Route::get('subscribed_2nd_year',[DashboardController::class,'subscribedSecondYear'])->name('subscribed_2nd_year');
        Route::get('subscribed_3rd_year',[DashboardController::class,'subscribedThirdYear'])->name('subscribed_3rd_year');
    });

});

