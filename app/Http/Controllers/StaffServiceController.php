<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffServiceController extends Controller
{
    public function index($staffId)
    {
        return view('staff.service.index',['staff'=>Staff::find($staffId)]);
    }

    public function register(Request $request, $staffId)
    {
        $request->validate(['service'=>'required']);
        $staff = Staff::find($staffId);
        $staff->staffServices()->firstOrCreate(['service_id'=>$request->service]);
        return redirect()->route('staff.service.index',[$staff->id]);
    }
}
