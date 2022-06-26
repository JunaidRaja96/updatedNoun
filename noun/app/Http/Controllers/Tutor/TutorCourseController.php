<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\{
    TutorCourse,
    Course,User
};

class TutorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TutorCourse::where('user_id',auth()->user()->id)->with('course')->get();
        return view('tutor.courseDetail.tutor-course-index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Course();
        $records = $data->where('status',"1")->get();
        return view('tutor.courseDetail.tutor-course-create',compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id'=>'required',
            'days'=>'required',
            'to'=>'required',
            'from'=>'required',
        ]);
        $days =  $request->days;
        $days = json_encode($days);
        $days = trim($days,"[]");
        $allDay = str_replace('"'," ",$days);

            $data  = new TutorCourse();
            $data->select_days = $allDay;
            $data->user_id =  auth()->user()->id;
            $data->course_id = $request->course_id;
            $data->to = $request->to;
            $data->from = $request->from;
            $data->link = $request->link;
            $data->save();
            return redirect()->route('course.index')->with('sweetalert',[
            'title' => 'Course Detail created successfully',
            'desc' => '',
            'type' => 'success'
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TutorCourse::findOrfail($id);
        $data2 = $data->select_days;
        $allDay = explode(",",$data2);
        $data_course = new Course();
        $records = $data_course->where('status',"1")->get();
        return view('tutor.courseDetail.tutor-course-edit',compact(['records','data','allDay']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'course_id'=>'required',
            'days'=>'required',
            'to'=>'required',
            'from'=>'required',
        ]);
        $days =  $request->days;
        $days = json_encode($days);
        $days = trim($days,"[]");
        $allDay = str_replace('"'," ",$days);

            $data_update  = new TutorCourse();
            $data = $data_update->findOrfail($id);
            $data->select_days = $allDay ?? $data->select_days;
            $data->user_id =  auth()->user()->id;
            $data->course_id = $request->course_id ?? $data->course_id ;
            $data->to = $request->to ?? $data->to;
            $data->from = $request->from ?? $data->from;
            $data->link = $request->link ?? $data->link ;
            $data->save();
            return redirect()->route('course.index')->with('sweetalert',[
            'title' => 'Course Detail Updated successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_update  = new TutorCourse();
        $data = $data_update->findOrfail($id);
        $data->delete();
        return redirect()->route('course.index')->with('sweetalert',[
            'title' => 'Course Detail Deleted successfully',
            'desc' => '',
            'type' => 'success'
        ]);
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
