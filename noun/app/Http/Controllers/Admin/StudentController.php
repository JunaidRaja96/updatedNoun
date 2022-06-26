<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User,studentSubscriptionCourse,StudentSubscription};

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('role','student')->with('subscribe.semester')->get();
        return view('admin.student.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::findOrfail($id);
        // $data['studentsubcourse'] = studentSubscriptionCourse::where('user_id',$id)->get();
        $data['studentsub'] = StudentSubscription::where('user_id',$id)->first();

        return view('admin.student.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status($id)
    {
        $data = new User();
        $data = $data->findOrfail($id);
        $data->status = !$data->status;
        $data->save();
        return redirect()->back()->with('sweetalert',[
            'title' => 'Status change successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
    public function subscribe($id)
    {
        $data = new User();
        $data = $data->findOrfail($id);
        $data->subscribed = !$data->subscribed;
        $data->save();
        return redirect()->back()->with('sweetalert',[
            'title' => 'Subscribed change successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
