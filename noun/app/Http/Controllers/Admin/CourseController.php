<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Course::all();
        return view('admin.course.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();
        Course::create([
        'title' => $request->title,
        'code' => $request->code,
        'status' => "1",
        ]);
        return redirect()->route('admin.course.index')->with('sweetalert',[
            'title' => 'Course created successfully',
            'desc' => '',
            'type' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Course::find($id);
        return view('admin.course.edit',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required',

        ]);
        Course::findOrFail($id)->update([
            'title' => $request->title,
            'code' => $request->code,
            'status' => "1",
        ]);
        return redirect()->route('admin.course.index')->with('sweetalert',[
            'title' => 'Course updated successfully',
            'type' => 'success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.course.index')->with('sweetalert',[
            'title' => 'Course deleted successfully',
            'type' => 'success'
        ]);
    }
}
