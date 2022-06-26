<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    StudentSubscription,
    studentSubscriptionCourse,
    Semester,
    Faculty,
    Course
};

class StudentSubscriptionController extends Controller
{
    public function subscription()
    {
        return redirect()->route('studentDashboard.student.subscription.' . $this->checkProgress());
    }
    public function createSemesterDetails()
    {
        $check = $this->checkProgress();
        if ($check != "step1") {
            return redirect()->route('student.subscription.' . $check);
        }

        $data['semesters'] = Semester::orderBy('year','DESC')->get();
        $data['faculties'] = Faculty::all();
        $data['courses'] = Course::all();
        return view('studentDashboard.student.subscription.step1', compact('data'));
    }

    public function storeSemesterDetails(Request $request)
    {
        $subscription = new StudentSubscription;
        $subscription->user_id = auth()->user()->id;
        $subscription->semester_id = $request->semester;
        $subscription->faculty_id = $request->faculty;
        $subscription->completed = 50;

        if($subscription->save()){
            $insert_courses = collect($request->courses)->map(function($course) use($subscription){
                return [
                    'student_subscription_id' => $subscription->id,
                    'course_id' => $course,
                ];
            });
            studentSubscriptionCourse::insert($insert_courses->toArray());

            return redirect()->route('student.subscription.step2');
        }
    }

    public function createPrefrences()
    {
        $check = $this->checkProgress();
        if ($check != "step2") {
            return redirect()->route('student.subscription.' . $check);
        }

        return view('student.subscription.step2');
    }

    public function storePrefrences(Request $request)
    {
        $subscription = StudentSubscription::where('user_id',auth()->user()->id)->latest()->first();
        abort_if(!$subscription,403);

        StudentSubscription::find($subscription->id)->update([
            "tma_test" => ($request->tma_test) ? 1 : 0,
            "past_questions" => ($request->past_questions) ? 1 : 0,
            "connect_with_tutor" => ($request->connect_with_tutor) ? 1 : 0,
            "become_a_tutor" => ($request->become_a_tutor) ? 1 : 0,
            "completed" => 75
        ]);
        return redirect()->route('student.subscription.step3');
    }

    public function createPayment()
    {
        $check = $this->checkProgress();
        if ($check != "step3") {
            return redirect()->route('student.subscription.' . $check);
        }

        return view('student.subscription.step3');
    }

    public function storePayment(Request $request)
    {

        $subscription = StudentSubscription::where('user_id',auth()->user()->id)->latest()->first();
        abort_if(!$subscription,403);

        StudentSubscription::find($subscription->id)->update([
            "account_name" => $request->account_name,
            "account_number" => $request->account_number,
            "bank" => $request->bank,
            "completed" => 100
        ]);
        return redirect()->route('student.subscription.step4');
    }

    public function success()
    {
        $check = $this->checkProgress();
        if ($check != "step4") {
            return redirect()->route('student.subscription.' . $check);
        }

        if (auth()->user()->subscribed == 1) {
            return redirect()->route('home')->with('sweetalert',[
                'title' => 'You subscribed successfully',
                'desc' => '',
                'type' => 'success'
            ]);
        }


        return view('studentDashboard.student.subscription.step4');
    }


    public function checkProgress()
    {
        $subscription = StudentSubscription::where('user_id',auth()->user()->id)->latest()->first();
        if (!$subscription) {
            return 'step1';
        } else if ($subscription->completed == '50') {
            return 'step2';
        } else if ($subscription->completed == '75') {
            return 'step3';
        }  else if ($subscription->completed == '100') {
            return 'step4';
        }
    }


}
