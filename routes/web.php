<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WaitingListController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PlayController;
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

Route::group(['middleware' => 'disable_back_btn'], function () {
    Route::group(['middleware' => 'guest:web'], function () {
        Route::get('/', function () {
            return view('student.home');
        });
        Route::get('register', [CustomLoginController::class, 'showRegisterForm'])->name('student.register');
        Route::post('register', [CustomLoginController::class, 'registerStudent'])->name('store.student');

        Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('student.login');
        Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [CustomLoginController::class, 'login'])->name('login.student');

        Route::get('home', function () {
            return view('student.home');
        })->name('home');

    });

    //View All Courses For anyone
    Route::get('courses/1st/year', [AcademicFirstYear::class, 'courses'])->name('courses.1st.students');
    Route::get('courses/2nd/year', [AcademicSecondYear::class, 'courses'])->name('courses.2nd.students');
    Route::get('courses/3rd/year', [AcademicThirdYear::class, 'courses'])->name('courses.3rd.students');
//    Route::get('students/openion',[StudentGeneralController::class,'']);

    Route::get('hash', function () {
        return bcrypt('12345678');
    });

    Route::get('about', [StudentGeneralController::class,'aboutUs'])->name('about');

    Route::get('contact',[StudentGeneralController::class,'contactUs'])->name('contact');
    Route::get('view/students/opinion',[StudentGeneralController::class,'showStudentsOpinion'])->name('opinion');
    Route::get('inbox',[StudentGeneralController::class,'inbox'])->name('inbox');

    Route::get('features',[DashboardController::class,'features'])->name('features');


    Route::group(['middleware' => 'auth:web'], function () {
        // Route::get('logout', [CustomLoginController::class, 'logout'])->name('logout');
        Route::post('logout', [CustomLoginController::class, 'logout'])->name('student.logout');
        Route::get('secondary/first/year', [AcademicFirstYear::class, 'index'])->name('academic_first_years');
        Route::get('secondary/second/year', [AcademicSecondYear::class, 'index'])->name('academic_second_years');
        Route::get('secondary/third/year', [AcademicThirdYear::class, 'index'])->name('academic_third_years');

        Route::get('course', function () {
            return view('student.courses');
        })->name('course');

        Route::post('message', [StudentGeneralController::class, 'storeMessage'])->name('msg');

        Route::get('first/year', [AcademicFirstYear::class, 'index'])->name('1st.year');
        Route::get('second/year', [AcademicSecondYear::class, 'index'])->name('2nd.year');
        Route::get('third/year', [AcademicThirdYear::class, 'index'])->name('3rd.year');


        Route::get('playlist', function () {
            return view('student.playlist');
        })->name('playlist');

        ####### To Subscribe First Year Course ##########
        Route::get('subscribe/1st/year/{id}',[AcademicFirstYear::class,'toSubscribeCourse'])->name('to.subscribe.1st');
        Route::post('subscribe/course/1st/{id}',[AcademicFirstYear::class,'subscribeCourseNow'])->name('subscribe.1st');
        ####### To Subscribe Second Year Course ##########
        Route::get('subscribe/2nd/year/{id}',[AcademicSecondYear::class,'toSubscribeCourse'])->name('to.subscribe.2nd');
        Route::post('subscribe/course/2nd/{id}',[AcademicSecondYear::class,'subscribeCourseNow'])->name('subscribe.2nd');
        ####### To Subscribe Third Year Course ##########
        Route::get('subscribe/3rd/year/{id}',[AcademicThirdYear::class,'toSubscribeCourse'])->name('to.subscribe.3rd');
        Route::post('subscribe/course/3rd/{id}',[AcademicThirdYear::class,'subscribeCourseNow'])->name('subscribe.3rd');

        //My Courses
        Route::get('enrolled/courses/1st',[AcademicFirstYear::class,'enrolledCoursesView'])->name('my.courses.1st');


        Route::get('enrolled/courses/2nd',[AcademicSecondYear::class,'enrolledCoursesView'])->name('my.courses.2nd');


        Route::get('enrolled/courses/3rd',[AcademicThirdYear::class,'enrolledCoursesView'])->name('my.courses.3rd');

        Route::get('weeks/page/1st/year/{id}',[AcademicFirstYear::class,'viewWeeksPage'])->name('view.course.weeks.1st');
        Route::get('weeks/page/2nd/year/{id}',[AcademicSecondYear::class,'viewWeeksPage'])->name('view.course.weeks.2nd');
        Route::get('weeks/page/3rd/year/{id}',[AcademicThirdYear::class,'viewWeeksPage'])->name('view.course.weeks.3rd');


        //view video courses
        Route::get('view/enrolled/course/lecture/1st/year/{id}',[AcademicFirstYear::class,'viewEnrolledCourse'])->name('view.enrolled.lecture.1st');
        Route::get('view/enrolled/course/lecture/2nd/year/{id}',[AcademicSecondYear::class,'viewEnrolledCourse'])->name('view.enrolled.lecture.2nd');
        Route::get('view/enrolled/course/lecture/3rd/year/{id}',[AcademicThirdYear::class,'viewEnrolledCourse'])->name('view.enrolled.lecture.3rd');

        Route::get('view/student/profile',[StudentGeneralController::class,'viewProfileForm'])->name('view.student.profile');
        Route::post('update/student/profile',[StudentGeneralController::class,'updateStudentProfile'])->name('update.student.profile');

        //Student HomeWork
        Route::get('view/homework/1st/year/{id}',[AcademicFirstYear::class,'viewStudentHomeWork'])->name('view.homework.link.1st');
        Route::get('view/homework/2nd/year/{id}',[AcademicSecondYear::class,'viewStudentHomeWork'])->name('view.homework.link.2nd');
        Route::get('view/homework/3rd/year/{id}',[AcademicThirdYear::class,'viewStudentHomeWork'])->name('view.homework.link.3rd');

        //Student Quiz
        Route::get('view/quiz/1st/year/{id}',[AcademicFirstYear::class,'viewStudentQuiz'])->name('view.quiz.link.1st');
        Route::get('view/quiz/2nd/year/{id}',[AcademicSecondYear::class,'viewStudentQuiz'])->name('view.quiz.link.2nd');
        Route::get('view/quiz/3rd/year/{id}',[AcademicThirdYear::class,'viewStudentQuiz'])->name('view.quiz.link.3rd');

        Route::get('token/lecture/{id}',[StudentGeneralController::class,'createLectureSource'])->name('view.lecture');


    });

//    Route::get('play', [StudentGeneralController::class, 'play']);
//    Route::get('admin/play', [DashboardController::class, 'play']);

});

Route::get('test',function(){
    return view('test');
});

Route::get('play',[PlayController::class,'addSomeStudentsToWaitingList']);


Route::get('auth/Student/Subscription/{string}',[AcademicThirdYear::class,'authenticateStudentsRegisterAndDelete']);

//Route::post('file-upload/upload-large-files/{name}/{academic_year}/{month}/{week}/{homework}/{quiz}',[\App\Http\Controllers\FileUploadController::class,'uploadLargeFiles'])->name('chunk.uploaded');

//name+ academic_year+month +week +homework +quiz

//Route::get('hash',function (){
//    return bcrypt(12345678);
//    return request()->getClientIp();
//    return substr(exec('getmac'), 0, 17);
//  });
// ALTER TABLE cheats ADD FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE;

// C:\xampp\htdocs\droos\storage\logs       laravel.logg
// SESSION_DOMAIN=alaa-elden.com
// 01150050050
// test@test.com

// P(A) = 1.013 * 10^5 N/m^2

// raw(S,q,z) = 1/2 raw(t)

// m(z) = raw * A * h  ==>  raw *  h * g
// P(z) = raw * A m * h * g / A     ==>  raw *  h * g


// m(z) = 1/2 raw * A * h
// P(z) ==========================================> 1/2 raw * g * h


//m(q) = raw * A * h  => 1/2 raw * g * h
// P(q) ==========================================> 1/2 raw * g * h

// m(s) = 2 * raw * A * h
// P(s) ==========================================> raw  * h * g

// m(t) = raw * A * h
// P(t) ==========================================> raw * h  * g

//

