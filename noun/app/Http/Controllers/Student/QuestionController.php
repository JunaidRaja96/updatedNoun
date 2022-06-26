<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PastQuestions, StudentSubscription, studentSubscriptionCourse, Course, tma};

class QuestionController extends Controller
{
    public function pastQuestion()
    {
        $data = PastQuestions::query()
        ->select(['past_questions.id', 'semesters.year', 'semesters.semester_no', 'courses.code', 'past_questions.file'])
        ->leftJoin('semesters', 'semester_id', '=', 'semesters.id')
        ->leftJoin('courses', 'course_id', '=', 'courses.id')
        ->get()
        ->groupBy('year');

        return view('studentDashboard.pastQuestion',compact('data'));
    }

    public function tma(Request $request)
    {

        $data['courses'] = Course::WhereIn(
            'id',
            studentSubscriptionCourse::where(
                'student_subscription_id',
                StudentSubscription::Where('user_id', auth()->user()->id)->latest()->first()->id
            )->get()->pluck('course_id')
        )->get()->pluck('code');

        $data['result'] = null;

        $results = tma::query();
        if (isset($request->search)) {
            $results = $results->whereRaw("MATCH(question,answer) AGAINST(?)", array($request->search));
            if (isset($request->course)) {
                $results = $results->where('course',$request->course);
            }
            $data['result'] = $results->get();
        }

        return view('studentDashboard.tma',compact('data'));
    }
}
