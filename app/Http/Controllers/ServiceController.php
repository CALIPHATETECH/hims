<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Department;

class ServiceController extends Controller
{
    public function index($departmentId)
    {
        return view('department.service.index',['department'=>Department::find($departmentId)]);
    }

    public function register(Request $request, $departmentId)
    {
        $request->validate(['name'=>'required']);
        Department::find($departmentId)->services()->firstOrCreate(['name'=>$request->name]);
        return redirect()->route('department.service.index',$departmentId);
    }
    
    public function update(Request $request,$departmentId, $serviceId)
    {
        $request->validate(['name'=>'required']);
        $service = Service::find($serviceId);
        $service->update(['name'=>strtoupper($request->name)]);

        return redirect()->route('department.service.index',$departmentId);
    }

    public function delete($departmentId,$serviceId)
    {
        
        $service = Service::find($serviceId);
        if($service){
            $service->delete();
        }
       
        return redirect()->route('department.service.index',$departmentId);
    }
}
