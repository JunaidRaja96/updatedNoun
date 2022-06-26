<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Semester,
    Course
};

use App\Imports\tmaImport;
use Maatwebsite\Excel\Facades\Excel;

class TmaController extends Controller
{
    public function create()
    {
        $data['courses'] = Course::all();
        return view('admin.tma.create',compact('data'));
    }

    public function store(Request $request)
    {
        Excel::import(new tmaImport($request->course), $request->file('file'));
        return redirect()->route('admin.tma.create')->with('sweetalert',[
            'title' => 'TMA uploaded successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
