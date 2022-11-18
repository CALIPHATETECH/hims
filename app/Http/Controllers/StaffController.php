<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index',['staffs'=>User::all()]);
    }

    public function register(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'department'=>'required',
            'role'=>'required',
        ]);
        $user = User::firstOrCreate([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            ]);
        $user->staff()->create([
            'department_id'=>$request->department,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'contact'=>$request->contact,
            'staff_id'=>$this->generateStaffId()
            ]);
        $user->update(['password'=>Hash::make($user->staff->staff_id)]);

        return redirect()->route('staff.index');
    }
    
    public function update(Request $request,$userId)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'department'=>'required',
            'role'=>'required',
        ]);
        $user = User::find($userId);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            ]);
        $user->staff()->update([
            'department_id'=>$request->department,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'contact'=>$request->contact,
            ]);
        return redirect()->route('staff.index');

    }

    public function delete($userId)
    {
        
        $user = User::find($userId);
        if($user){
            $user->staff->delete();
            $user->delete();
        }
       
        return redirect()->route('staff.index');
    }

    public function generateStaffId()
    {
        for($i=1; $i<=9999; $i++){
            $staffId = 'Staff'.$this->formatNo($i);
            if(Staff::where('staff_id', $staffId)->first() == null){
                return $staffId;
            }
        }
        
    }

    public function formatNo($number)
    {
        if($number<10){
            $number = '000'.$number;
        }elseif($number < 100){
            $number = '00'.$number;
        }elseif($number < 1000){
            $number = '0'.$number;
        }
        return $number;
    }
}
