<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{
    UserContactController,
};
use App\Http\Controllers\Tutor\{
    TutorCourseController,
    TutorBankDetailsController,
    StudentCourseController
};
use App\Http\Controllers\Auth\{
    LoginController,
    LogoutController,
    RegisterController
    };
    use App\Http\Controllers\web\{
        BlogController,
        };
        use App\Http\Middleware\{Student,Tutor};

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


Route::view('admin/login', 'auth.admin-login')->name('auth.admin-login');
Route::post('admin/login',[LoginController::class,'admin'])->name('admin.authenticate');
Route::post("admin/logout",[LogoutController::class,"admin"])->name("admin.logout");


/* Student and Tutor */

Route::post("logout",[LogoutController::class,"logout"])->name("logout");
Route::view('login', 'auth.login')->name('auth.login');
Route::post('login',[LoginController::class,'login'])->name('loginPost');
Route::view('register', 'auth.register')->name('auth.register');
Route::post('register', [RegisterController::class,'register'])->name('register.store');


Route::get('/blog/{slug}', [BlogController::class,"single"])->name('blog.show');
Route::get('blog',[BlogController::class,"list"])->name('blog');




//Student

Route::view('/','web.home')->name('home');
Route::get('/email/verify', function () {
    if(auth::user() != null)
    {
        if(!isset(auth()->user()->email_verified_at))
        {
            return view('auth.verify-email');

        }
        else
        {
            return redirect()->route('home');
        }
    }

    })->middleware(['auth'])->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');



    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

       if(auth()->user())
       {
        return redirect('/');
       }
        else{
            return redirect('/login');
        }
    })->middleware(['auth', 'signed'])->name('verification.verify');


//teacher
Route::middleware(['tutor','verified'])->group(function(){

    Route::view('tutor','tutor.profile')->name('tutor');
    Route::resources([
        'tutor/course' => TutorCourseController::class,
        'tutor/bankdetail' => TutorBankDetailsController::class,



    ]);
    Route::get('tutor/student/course',[StudentCourseController::class,'index'])->name('tutor.student.course');
    Route::view('profile','tutor.profile')->name('profile');
    Route::post('changepassword',[TutorCourseController::class,'changepassword'])->name('changepassword');

});
Route::post('usercontact/store',[UserContactController::class,'store'])->name('usercontact.store');





