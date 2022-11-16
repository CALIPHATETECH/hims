<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('department.index',['departments'=>Department::all()]);
    }

    public function register(Request $request)
    {
        $request->validate(['name'=>'required']);
        Department::firstOrCreate(['name'=>strtoupper($request->name)]);
        return redirect()->route('department.index');
    }
    
    public function update(Request $request,$departmentId)
    {
        $request->validate(['name'=>'required']);
        $department = Department::find($departmentId);
        $department->update(['name'=>strtoupper($request->name)]);

        return redirect()->route('department.index');
    }

    public function delete($departmentId)
    {
        
        $department = Department::find($departmentId);
        if($department){
            $department->delete();
        }
       
        return redirect()->route('department.index');
    }

}
