<?php

use App\Http\Controllers\Student\AcademicFirstYear;
use App\Http\Controllers\Student\AcademicSecondYear;
use App\Http\Controllers\Student\AcademicThirdYear;
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

Route::group(['middleware' => 'disable_back_btn'], function () {

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
        Route::post('admin/post/login', [AdminLoginController::class, 'login'])->name('signIn');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('admin/logout', [AdminLoginController::class, 'logout']);

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('admin/teachers', [DashboardController::class, 'showTeachers'])->name('teachers');

        //View Students Who Have an Account
        Route::get('student_1st_year', [DashboardController::class, 'studentsFirstYear'])->name('student_1st_year');
        Route::get('student_2nd_year', [DashboardController::class, 'studentsSecondYear'])->name('student_2nd_year');
        Route::get('student_3rd_year', [DashboardController::class, 'studentsThirdYear'])->name('student_3rd_year');

        //View WaitingList Students
        Route::get('waiting_list_1st_year', [DashboardController::class, 'waitingListFirstYear'])->name('waiting_list_1st_year');
        Route::get('waiting_list_2nd_year', [DashboardController::class, 'waitingListSecondYear'])->name('waiting_list_2nd_year');
        Route::get('waiting_list_3rd_year', [DashboardController::class, 'waitingListThirdYear'])->name('waiting_list_3rd_year');

        //View Subscribed Students
        Route::get('subscribed_1st_year', [DashboardController::class, 'subscribedFirstYear'])->name('subscribed_1st_year');
        Route::get('subscribed_2nd_year', [DashboardController::class, 'subscribedSecondYear'])->name('subscribed_2nd_year');
        Route::get('subscribed_3rd_year', [DashboardController::class, 'subscribedThirdYear'])->name('subscribed_3rd_year');

        //Academic First Year [add , edit , delete actions]
        Route::get('all/courses/1st/year', [AcademicFirstYear::class, 'showAllCourses']);
        Route::get('admin/add/courses', [DashboardController::class, 'showCoursesAddForm']);
        Route::post('admin/add/courses', [DashboardController::class, 'addCourses'])->name('store.courses');
        Route::get('edit/courses/1st/year/{id}', [AcademicFirstYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/1st/year/{id}', [AcademicFirstYear::class, 'updateCourse'])->name('edit.course.1st');
        Route::post('delete/courses/1st/year/{id}', [AcademicFirstYear::class, 'deleteCourse'])->name('delete.course.1st');


        //Academic Second Year [add , edit , delete actions]
        Route::get('all/courses/2nd/year', [AcademicSecondYear::class, 'showAllCourses']);
        Route::get('edit/courses/2nd/year/{id}', [AcademicSecondYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/2nd/year/{id}', [AcademicSecondYear::class, 'updateCourse'])->name('edit.course.2nd');
        Route::post('delete/courses/2nd/year/{id}', [AcademicSecondYear::class, 'deleteCourse'])->name('delete.course.2nd');


        //Academic Third Year [add , edit , delete actions]
        Route::get('all/courses/3rd/year', [AcademicThirdYear::class, 'showAllCourses']);
        Route::get('edit/courses/3rd/year/{id}', [AcademicThirdYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/3rd/year/{id}', [AcademicThirdYear::class, 'updateCourse'])->name('edit.course.3rd');
        Route::post('delete/courses/3rd/year/{id}', [AcademicThirdYear::class, 'deleteCourse'])->name('delete.course.3rd');

        //Admin Profile
        Route::get('admin/profile',[DashboardController::class,'showTeacherProfile'])->name('teacher.profile');




    });

});
