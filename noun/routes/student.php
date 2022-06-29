<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentSubscriptionController;
use App\Http\Controllers\Student\{
    MeetaTutorController,
    StudentTutorCourseController,
};
use App\Models\PastQuestions;

Route::controller(StudentSubscriptionController::class)->group(function () {
    Route::get('subscription','subscription')->name('subscription');
    Route::get('subscription/semester-details','createSemesterDetails')->name('subscription.step1');
    Route::post('subscription/semester-details','storeSemesterDetails')->name('subscription.step1.store');

    Route::get('subscription/prefrences','createPrefrences')->name('subscription.step2');
    Route::post('subscription/prefrences','storePrefrences')->name('subscription.step2.store');

    Route::get('subscription/payment','createPayment')->name('subscription.step3');
    Route::post('subscription/payment','storePayment')->name('subscription.step3.store');

    Route::get('subscription/success','success')->name('subscription.step4');
});


Route::middleware(['subscribed.student'])->group(function () {
    //Become A Tutor
    Route::view('becomeatutor','studentDashboard.becomeatutor')->name('becomeatutor');
    Route::post('becomeatutor/store',[MeetaTutorController::class,'becomeaTutor'])->name('becomeatutor.store');
    Route::post('sentrequest',[StudentTutorCourseController::class,'sentrequest'])->name('sentrequest');
    Route::get('meetatutor',[MeetaTutorController::class,'index'])->name('meetatutor');
    Route::get('mytutor',[MeetaTutorController::class,'mytutor'])->name('mytutor');
    Route::view('subscription','studentDashboard.subscription')->name('subscription');
    Route::view('tma','studentDashboard.tma')->name('tma');

    Route::get('pastquestions', function(){
        $data = PastQuestions::query()
        ->select(['past_questions.id', 'semesters.year', 'semesters.semester_no', 'courses.code', 'past_questions.file'])
        ->leftJoin('semesters', 'semester_id', '=', 'semesters.id')
        ->leftJoin('courses', 'course_id', '=', 'courses.id')
        ->get()
        ->groupBy('year');

        return view('studentDashboard.pastQuestion',compact('data'));
    })->name('pastquestions');
    Route::view('profile','studentDashboard.profile')->name('profile');
    Route::get('edit/Step2',[StudentSubscriptionController::class,'editprefrence'])->name('step2');
    Route::post('update/Step2',[StudentSubscriptionController::class,'prefrenceUpdate'])->name('prefrenceUpdate');
    Route::post('changepassword',[MeetaTutorController::class,'changepassword'])->name('changepassword');
});
