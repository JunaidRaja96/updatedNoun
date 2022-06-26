<?php
use App\Http\Controllers\Admin\{
    BlogCategoryController,
    BlogController,
    SemesterController,
    FacultyController,
    CourseController,
    PastQuestionController,
    StudentController,
    UserContactController,
    TutorController,
    TmaController
};
use App\Http\Middleware\Student;
use Illuminate\Support\Facades\Route;

Route::resources([
    'blogs' => BlogController::class,
    'blog/categories' => BlogCategoryController::class,
    'semester'=> SemesterController::class,
    'faculty'=> FacultyController::class,
    'course' => CourseController::class,
]);

Route::resource('students', StudentController::class)->only([
    'index', 'show', 'create', 'store', 'update'
]);

Route::get('pastquestion/index',[PastQuestionController::class,'index'])->name('pastquestion.index');
Route::get('pastquestion/create',[PastQuestionController::class,'create'])->name('pastquestion.create');
Route::post('pastquestion',[PastQuestionController::class,'store'])->name('pastquestion.store');
Route::get('student/status/{id}',[StudentController::class,'status'])->name('student.status');
Route::get('student/subscribestatus/{id}',[StudentController::class,'subscribe'])->name('student.subscribestatus');

Route::get('tma',[TmaController::class,'create'])->name('tma.create');
Route::post('tma',[TmaController::class,'store'])->name('tma.store');

Route::view('dashboard','sample-page')->name('dashboard');
Route::prefix('blog')->name('blog.')->group(function () {
    Route::view('index', 'admin.blog.index')->name('index');
    Route::view('create', 'admin.blog.create-blog')->name('create');
    // Route::get('edit/{id}/edit', 'admin.blog.edit-blog')->name('edit');
});

Route::get('tutor/index',[TutorController::class,'index'])->name('tutor.index');
Route::get('tutor/status/{id}',[TutorController::class,'status'])->name('tutor.status');

Route::get('usercontact/index',[UserContactController::class,'index'])->name('usercontact.index');
Route::get('usercontact/show/{id?}',[UserContactController::class,'show'])->name('usercontact.show');
Route::delete('usercontact/destroy/{id}',[UserContactController::class,'destroy'])->name('usercontact.destroy');


