<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{StudenTutorCourse,
    Course,
    User,
    TutorCourse
};

class StudentCourseController extends Controller
{
    public function index()
    {
        $tutor_courses = new TutorCourse();
        $data['tutor_courses'] = $tutor_courses->with('course')->get();
        $data['studentTutorCourse'] = StudenTutorCourse::query()
        ->select(['tutor_course_id','name'])
        ->leftJoin('users', 'student_id', '=', 'users.id')
        ->get()
        ->groupBy('tutor_course_id')
        ->toArray();

        return view('tutor.studentcourse.index',compact('data'));
     }
}
