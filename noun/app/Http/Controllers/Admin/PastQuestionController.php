<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Semester,
    Course,
    PastQuestions
};

class PastQuestionController extends Controller
{
    public function index()
    {
        $data = PastQuestions::query()
        ->select(['past_questions.id', 'semesters.year', 'semesters.semester_no', 'courses.code', 'past_questions.file'])
        ->leftJoin('semesters', 'semester_id', '=', 'semesters.id')
        ->leftJoin('courses', 'course_id', '=', 'courses.id')
        ->get()
        ->groupBy('year');
        return view('admin.pastQuestion.index',compact('data'));

    }


    public function create()
    {
        $data['semesters'] = Semester::all();
        $data['courses'] = Course::all();
        return view('admin.pastQuestion.create',compact('data'));
    }

    public function store(Request $request)
    {
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('file/pastQuestions'), $fileName);

        $past_questions = new PastQuestions;
        $past_questions->semester_id = $request->semester;
        $past_questions->course_id =  $request->course;
        $past_questions->file =  $fileName;
        $past_questions->save();

        return redirect()->route('admin.pastquestion.create')->with('sweetalert',[
            'title' => 'Past Question uploaded successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
