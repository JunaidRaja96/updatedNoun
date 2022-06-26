<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    StudenTutorCourse
};

class StudentTutorCourseController extends Controller
{
    public function sentrequest(Request $request)
    {
        $data = new StudenTutorCourse();
        $data->student_id  = auth()->user()->id;
        $data->tutor_course_id   = $request->tutor_course_id;
        $data->save();
        return redirect()->route('home')->with('sweetalert',[
            'title' => 'Enroll successfully',
            'desc' => '',
            'type' => 'success'
        ]);


    }
}
