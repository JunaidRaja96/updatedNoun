<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    UserContact
};

class UserContactController extends Controller
{
    public function index()
    {
        $data = UserContact::latest()->get();

        return view('admin.usercontact.index',compact('data'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' =>'required',
            'email' =>'required|unique:users',
            'phone_number' =>'required',
            'message' =>'required',
        ]);
        UserContact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number' => $request->phone_number,
            'message'=>$request->message,
        ]);
        return redirect()->back()->with('sweetalert',[
            'title' => 'Message sent successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
    public function show($id)
    {
        $data = UserContact::findOrfail($id);
        return view('admin.usercontact.show',compact('data'));
    }
    public function destroy($id)
    {
        $data = new UserContact();
        $record = $data->find($id);
        $record->delete();
        return redirect()->route('admin.usercontact.index')->with('sweetalert',[
            'title' => 'Message Deleted successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
