<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{TutorCourse,Course,User,StudentSubscription,StudentSubscriptionCourse,StudenTutorCourse};
use Illuminate\Support\Facades\Hash;


class MeetaTutorController extends Controller
{
    //Meet a tutor
    public function index(Request $request)
    {
        $subscription = StudentSubscription::where('user_id',auth()->user()->id)->latest()->first();
        $courses = StudentSubscriptionCourse::where('student_subscription_id', $subscription->id)->get()->pluck('course_id');
        $records = new TutorCourse();
        $course = new Course();
        $req = $request->search;
        if (isset($request->course)) {
            $records = $records->whereIn('course_id',$request->course);
        }
        $records = $records->with(['user','course'])->whereIn('course_id',$courses)->get();
        $course_detail = $course->whereIn('id',$courses)->get();
        return view('studentDashboard.meetatutor',compact(['records','course_detail']));
    }

    public function becomeaTutor(Request $request)
    {
        $user = new User();
        $user = $user->find(auth()->user()->id);
        $user->tutor_also = $request->tutor_also;
        $user->save();
        return redirect()->route('home')->with('sweetalert',[
            'title' => 'You become Tutor successfully',
            'type' => 'success'
        ]);
    }
    public function mytutor()
    {
       $data =new StudenTutorCourse();
       $record = $data->where('student_id',auth()->user()->id)->get()->pluck('tutor_course_id');
       $tutordata =new TutorCourse();
       $tuturrecords = $tutordata->whereIn('course_id',$record)->with(['user','course'])->get();
        return view('studentDashboard.mytutor',compact('tuturrecords'));

    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password|min:6',
        ]);

        $user =User::findOrfail(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->back()->with('sweetalert',[
            'title' => 'Your Password Chagne successfully',
            'type' => 'success'
        ]);


    }
}
