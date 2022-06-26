<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    TutorBankDetails,
};

class TutorBankDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TutorBankDetails::where('user_id',auth()->user()->id)->get();
        return view('tutor.bankDetail.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutor.bankDetail.create');
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
            'bankname'=>'required',
            'accountname'=>'required',
            'accountnumber'=>'required',
        ]);

        $data = new TutorBankDetails();
        $data->user_id =  auth()->user()->id;
        $data->bank_name = $request->bankname;
        $data->account_name = $request->accountname;
        $data->account_number = $request->accountnumber;
        $data->save();
        return redirect()->route('bankdetail.index')->with('sweetalert',[
            'title' => 'Bank Detail created successfully',
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
        $data = TutorBankDetails::findOrfail($id);
        return view('tutor.bankDetail.edit',compact('data'));
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
            'bankname'=>'required',
            'accountname'=>'required',
            'accountnumber'=>'required',
        ]);

        $record = new TutorBankDetails();
        $data = $record->findOrfail($id);
        $data->user_id =  auth()->user()->id;
        $data->bank_name = $request->bankname;
        $data->account_name = $request->accountname;
        $data->account_number = $request->accountnumber;
        $data->save();
        return redirect()->route('bankdetail.index')->with('sweetalert',[
            'title' => 'Bank Detail Updated successfully',
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
        $data_update  = new TutorBankDetails();
        $data = $data_update->findOrfail($id);
        $data->delete();
        return redirect()->route('bankdetail.index')->with('sweetalert',[
            'title' => 'Bank Detail Deleted successfully',
            'desc' => '',
            'type' => 'success'
        ]);
    }
}
