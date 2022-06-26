<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Requests\SemesterRequest;


class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Semester::orderBy('year','DESC')->get();
        return view('admin.semester.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterRequest $request)
    {

        $validatedData = $request->validated();
        $no = (int)$request->semester;
        for($x = 1; $x <= $no; $x++)
        {
            Semester::firstOrCreate(
                ['year' => $request->year, 'semester_no' => $x],
                ['status' => 1]
            );
        }
        return redirect()->route('admin.semester.index')->with('sweetalert',[
            'title' => 'Semester created successfully',
            'desc' => 'Duplicate semesters are skipped by default',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Semester::find($id);
        return view('admin.semester.edit',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Semester::findOrFail($id)->update([
            // 'year' => $request->year,
            // 'semester_no' => $request->semester,
            'status'=>$request->status
        ]);
        return redirect()->route('admin.semester.index')->with('sweetalert',[
            'title' => 'Semester updated successfully',
            'type' => 'success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semester::findOrFail($id)->delete();
        return redirect()->route('admin.semester.index')->with('sweetalert',[
            'title' => 'Semester deleted successfully',
            'type' => 'success'
        ]);
    }
}
