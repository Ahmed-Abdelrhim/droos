<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\WaitingListController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Student\AcademicFirstYear;
use App\Http\Controllers\Student\AcademicSecondYear;
use App\Http\Controllers\Student\AcademicThirdYear;
use App\Http\Controllers\StudentGeneralController;
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
//        Route::get('login', [CustomLoginController::class, 'showLoginForm']);
    });

    Route::group(['middleware' => 'auth:admin' , 'prefix' => 'admin'], function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        //go-to-dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('teachers', [DashboardController::class, 'showTeachers'])->name('teachers');

        //View Students Who Have an Account
        Route::get('student_1st_year', [DashboardController::class, 'studentsFirstYear'])->name('student_1st_year');
        Route::get('student_2nd_year', [DashboardController::class, 'studentsSecondYear'])->name('student_2nd_year');
        Route::get('student_3rd_year', [DashboardController::class, 'studentsThirdYear'])->name('student_3rd_year');

        //View WaitingList Students
        Route::get('waiting/list/1st/year', [DashboardController::class, 'waitingListFirstYear'])->name('waiting_list_1st_year');
        Route::get('waiting/list/2nd/year', [DashboardController::class, 'waitingListSecondYear'])->name('waiting_list_2nd_year');
        Route::get('waiting/list/3rd/year', [DashboardController::class, 'waitingListThirdYear'])->name('waiting_list_3rd_year');

        //View Subscribed Students
        Route::get('subscribed/1st/year', [DashboardController::class, 'subscribedFirstYear'])->name('subscribed.1st.year');
        Route::post('delete/subscribed/1st/{id}',[AcademicFirstYear::class,'deleteSubscription'])->name('delete.subscribed.1st');

        Route::get('subscribed/2nd/year', [DashboardController::class, 'subscribedSecondYear'])->name('subscribed.2nd.year');
        Route::post('delete/subscribed/2nd/{id}',[AcademicSecondYear::class,'deleteSubscription'])->name('delete.subscribed.2nd');

        Route::get('subscribed/3rd/year', [DashboardController::class, 'subscribedThirdYear'])->name('subscribed.3rd.year');
        Route::post('delete/subscribed/3rd/{id}',[AcademicThirdYear::class,'deleteSubscription'])->name('delete.subscribed.3rd');


        //Academic First Year [add , edit , delete actions]
        Route::get('all/courses/1st/year', [AcademicFirstYear::class, 'showAllCourses'])->name('all.courses.1st');
        Route::get('add/courses', [CourseController::class, 'showCoursesAddForm'])->name('add.course');
        Route::post('add/courses', [CourseController::class, 'addCourses'])->name('store.courses');
        Route::get('edit/courses/1st/year/{id}', [AcademicFirstYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/1st/year/{id}', [AcademicFirstYear::class, 'updateCourse'])->name('edit.course.1st');
        Route::post('delete/courses/1st/year/{id}', [AcademicFirstYear::class, 'deleteCourse'])->name('delete.course.1st');


        //Academic Second Year [add , edit , delete actions]
        Route::get('all/courses/2nd/year', [AcademicSecondYear::class, 'showAllCourses'])->name('all.courses.2nd');
        Route::get('edit/courses/2nd/year/{id}', [AcademicSecondYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/2nd/year/{id}', [AcademicSecondYear::class, 'updateCourse'])->name('edit.course.2nd');
        Route::post('delete/courses/2nd/year/{id}', [AcademicSecondYear::class, 'deleteCourse'])->name('delete.course.2nd');


        //Academic Third Year [add , edit , delete actions]
        Route::get('all/courses/3rd/year', [AcademicThirdYear::class, 'showAllCourses'])->name('all.courses.3rd');
        Route::get('edit/courses/3rd/year/{id}', [AcademicThirdYear::class, 'showCourseEditForm']);
        Route::post('edit/courses/3rd/year/{id}', [AcademicThirdYear::class, 'updateCourse'])->name('edit.course.3rd');
        Route::post('delete/courses/3rd/year/{id}', [AcademicThirdYear::class, 'deleteCourse'])->name('delete.course.3rd');

        //Admin Profile
        Route::get('profile',[DashboardController::class,'showTeacherProfile'])->name('teacher.profile');
        Route::post('update/admin/profile/{id}',[DashboardController::class,'updateAdminProfile'])->name('update.admin.profile');

        //All Students···
        Route::get('all/students/1st/year',[AcademicFirstYear::class,'allStudents'])->name('all.students.1st');
        Route::get('get/first/year/students',[AcademicFirstYear::class,'studentsDataTable'])->name('students.datatables.1st');

        Route::get('all/students/2nd/year',[AcademicSecondYear::class,'allStudents'])->name('all.students.2nd');
        Route::get('get/second/year/students',[AcademicSecondYear::class,'studentsDataTable'])->name('students.datatables.2nd');


        Route::get('all/students/3rd/year',[AcademicThirdYear::class,'allStudents'])->name('all.students.3rd');
        Route::get('get/third/year/students',[AcademicThirdYear::class,'studentsDataTable'])->name('students.datatables.3rd');
        Route::post('delete/student/{id}',[StudentGeneralController::class,'deleteStudent'])->name('delete.student');

        //Waiting List···
        Route::get('view/waiting/list/1st',[WaitingListController::class,'waitingFirstYear'])->name('waiting.list.1st');
        Route::post('activate/waiting/list/1st/{id}' , [WaitingListController::class,'activateWaitingListFirstYear'])->name('activate.waiting.1st');
        Route::post('delete/waiting/list/1st/{id}' , [WaitingListController::class,'deleteWaitingListFirstYear'])->name('delete.waiting.1st');

        Route::get('view/waiting/list/2nd',[WaitingListController::class,'waitingSecondYear'])->name('waiting.list.2nd');
        Route::post('activate/waiting/list/2nd/{id}',[WaitingListController::class,'activateWaitingListSecondYear'])->name('activate.waiting.2nd');
        Route::post('delete/waiting/list/2nd/{id}' , [WaitingListController::class,'deleteWaitingListSecondYear'])->name('delete.waiting.2nd');

        Route::get('view/waiting/list/3rd',[WaitingListController::class,'waitingThirdYear'])->name('waiting.list.3rd');
        Route::post('activate/waiting/list/3rd/{id}',[WaitingListController::class,'activateWaitingListThirdYear'])->name('activate.waiting.3rd');
        Route::post('delete/waiting/list/3rd/{id}' , [WaitingListController::class,'deleteWaitingListThirdYear'])->name('delete.waiting.3rd');

        //Adding New Lectures
        Route::group(['prefix' => 'add/new'],function (){
            Route::get('getCourseMonths/{id}',[DashboardController::class,'getCourseMonths'])->name('new.lec');
        });
        Route::get('add/new/lecture',[DashboardController::class,'showAddNewLectureForm'])->name('add.new.lec');
        Route::post('add/new/lecture',[DashboardController::class,'addNewLecture'])->name('store.new.lec');

        Route::get('view/lectures/1st/year',[AcademicFirstYear::class,'getLectures'])->name('get.lec.1st.year');
        Route::post('delete/lectures/1st/year/{id}',[AcademicFirstYear::class,'deleteLecture'])->name('delete.lec.1st');
        Route::get('update/lectures/1st/year/{id}',[AcademicFirstYear::class,'updateLectureForm'])->name('update.lec.form.1st');
        Route::post('update/lectures/1st/year/{id}',[AcademicFirstYear::class,'updateLecture'])->name('update.lec.1st');

        Route::get('view/lectures/2nd/year',[AcademicSecondYear::class,'getLectures'])->name('get.lec.2nd.year');
        Route::post('delete/lectures/2nd/year/{id}',[AcademicSecondYear::class,'deleteLecture'])->name('delete.lec.2nd');
        Route::get('update/lectures/2nd/year/{id}',[AcademicSecondYear::class,'updateLectureForm'])->name('update.lec.form.2nd');
        Route::post('update/lectures/2nd/year/{id}',[AcademicSecondYear::class,'updateLecture'])->name('update.lec.2nd');

        Route::get('view/lectures/3rd/year',[AcademicThirdYear::class,'getLectures'])->name('get.lec.3rd.year');
        Route::post('delete/lectures/3rd/year/{id}',[AcademicThirdYear::class,'deleteLecture'])->name('delete.lec.3rd');
        Route::get('update/lectures/3rd/year/{id}',[AcademicThirdYear::class,'updateLectureForm'])->name('update.lec.form.3rd');
        Route::post('update/lectures/3rd/year/{id}',[AcademicThirdYear::class,'updateLecture'])->name('update.lec.3rd');


        //HomeWork
        Route::get('add/new/homework',[DashboardController::class,'homeWorkForm'])->name('add.new.homework');
        Route::post('store/new/homework',[DashboardController::class,'storeHomework'])->name('store.new.homework');
        Route::get('add/new/get/course/months/{id}',[DashboardController::class,'getCourseMonths'])->name('get.course.month');

        Route::get('get/homework/1st/year',[AcademicFirstYear::class,'getHomeWork'])->name('get.homework.1st.year');
        Route::get('get/homework/3rd/year',[AcademicSecondYear::class,'getHomeWork'])->name('get.homework.2nd.year');
        Route::get('get/homework/2nd/year',[AcademicThirdYear::class,'getHomeWork'])->name('get.homework.3rd.year');

        Route::post('delete/homework/1st/year/{id}',[AcademicFirstYear::class,'deleteHomeWork'])->name('delete.homework.1st');
        Route::post('delete/homework/2nd/year/{id}',[AcademicSecondYear::class,'deleteHomeWork'])->name('delete.homework.2nd');
        Route::post('delete/homework/3rd/year/{id}',[AcademicThirdYear::class,'deleteHomeWork'])->name('delete.homework.3rd');


        //Quiz
        Route::get('add/new/quiz',[DashboardController::class,'quizForm'])->name('add.new.quiz');
        Route::post('store/new/quiz',[DashboardController::class,'storeQuiz'])->name('store.new.quiz');

        Route::get('view/quiz/1st/year',[AcademicFirstYear::class,'getQuiz'])->name('get.quiz.1st.year');
        Route::get('view/quiz/2nd/year',[AcademicSecondYear::class,'getQuiz'])->name('get.quiz.2nd.year');
        Route::get('view/quiz/3rd/year',[AcademicThirdYear::class,'getQuiz'])->name('get.quiz.3rd.year');

        Route::post('delete/quiz/1st/year/{id}',[AcademicFirstYear::class,'deleteQuiz'])->name('delete.quiz.1st');
        Route::post('delete/quiz/2nd/year/{id}',[AcademicSecondYear::class,'deleteQuiz'])->name('delete.quiz.2nd');
        Route::post('delete/quiz/3rd/year/{id}',[AcademicThirdYear::class,'deleteQuiz'])->name('delete.quiz.3rd');



        //Messages
        Route::get('student/messages',[DashboardController::class,'viewMessages'])->name('view.msg');
        Route::get('reply/msg/{id}',[DashboardController::class,'replyMsgForm'])->name('reply.msg.form');
        Route::post('replying/msg/{id}',[DashboardController::class,'adminReplyMsg'])->name('store.admin.msg');
        Route::post('delete/message/{id}',[DashboardController::class,'deleteMessage'])->name('delete.msg');

        Route::get('vvv/{id}',[DashboardController::class,'getCourseMonths']);

        //Who Are We
        Route::get('who/are/we',[DashboardController::class,'whoAreWeForm'])->name('who.are.we');
        Route::post('update/who/are/we',[DashboardController::class,'updateWhoAreWe'])->name('store.who.are.we');

        //Add New Feature
        Route::get('add/feature',[DashboardController::class,'addNewFeatureForm'])->name('add.feature');
        Route::post('add/new/feature',[DashboardController::class,'storeNewFeature'])->name('store.feature');

        //Add demo videos
        Route::get('add/demo/video',[DashboardController::class,'demoVideosForm'])->name('demo.videos');
        Route::post('store/demo/videos' , [DashboardController::class,'addDemoVideo'])->name('store.demo.videos');


        //Route::get('uploading',[HomeController::class,'index'])->name('chunk.upload');
        Route::get('upload',[FileUploadController::class,'index'])->name('chunk.upload');
        Route::post('file-upload/upload-large-files',[FileUploadController::class,'uploadLargeFiles'])->name('chunk.uploaded');
        Route::post('post/post',[FileUploadController::class,'add'])->name('post.post');

    });

});

Route::get('large/file', [HomeController::class,'index'])->name('large');
Route::post('large/file/size',[HomeController::class,'uploadLargeFiles'])->name('large.file');

// 'lec' => 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime

//    php_value upload_max_filesize 999M
//    php_value post_max_size 64M
//    php_value max_execution_time 900
//    php_value max_input_time 900
 //شده التيار ⚡



//     $2y$10$4M0hrgUyniov4v2FHs1a6.y13Vvm1t9e61ltLZUbxe2YU3DW9QnQy .
//     $2y$10$Cx9KeusVkTWsPbihp2Hd4.BsCcAAPnsdnQZ9h/GBaN5np9S3nLsGu  .

// table for questions :
//  1 = id
// 2 = string('question');
// 3 = string('answer');
// 4 = int('grade');

// table for quiz
// 1 = id
// 2 = unsignedInt('question_id'); foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
// 3 = string('choice');

// table for correction
// 1 = id
// 2 = unsignedInt('student_id'); foreign('student_id')->references('users')->on('id')->onDelete('cascade');
// 3 = unsignedInt('question_id'); foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
// 4 = string('std_ans');
// 5 = unique(['student_id' , 'question_id']);

// table marks
// 1 = id
// 2 = unsignedInt('student_id'); foreign('student_id')->references('users')->on('id')->onDelete('cascade');
// 3 = int('mark');
