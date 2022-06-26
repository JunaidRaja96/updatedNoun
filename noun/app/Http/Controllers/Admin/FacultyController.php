<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faculty::all();
        return view('admin.faculty.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
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
            'name' => 'required|min:3|max:100|unique:faculties',
        ]);

        Faculty::create([
        'name' => $request->name,
        'status' => "1",
        ]);
        return redirect()->route('admin.faculty.index')->with('sweetalert',[
            'title' => 'Faculty created successfully',
            'desc' => '',
            'type' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Faculty::find($id);
        return view('admin.faculty.edit',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:faculties',
        ]);
        Faculty::findOrFail($id)->update([
        'name' => $request->name,
        'status' => $request->status ?? 1]);
        return redirect()->route('admin.faculty.index')->with('sweetalert',[
            'title' => 'Faculty updated successfully',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::findOrFail($id)->delete();
        return redirect()->route('admin.faculty.index')->with('sweetalert',[
            'title' => 'Faculty deleted successfully',
            'type' => 'success'
        ]);
    }
}
