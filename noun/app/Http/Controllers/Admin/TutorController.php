<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User};

class TutorController extends Controller
{
    public function index()
    {
        $data['users'] = User::where('role','tutor')->get();
        return view('admin.tutor.index',compact('data'));

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
}
