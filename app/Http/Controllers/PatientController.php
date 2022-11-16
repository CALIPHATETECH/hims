<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Service;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index',['patients'=>Patient::all()]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'next_of_kin_contact'=>'required',
        ]);
        Patient::firstOrCreate([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'next_of_kin_contact'=>$request->next_of_kin_contact,
            'hospital_no'=>$this->generateHospitalNo(),
            ]);
        return redirect()->route('patient.index');
    }
    
    public function update(Request $request,$patientId)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'next_of_kin_contact'=>'required',
        ]);
        Patient::find($patientId)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'next_of_kin_contact'=>$request->next_of_kin_contact,
            ]);
        return redirect()->route('patient.index');

    }

    public function verify(Request $request)
    {
        $request->validate(['hospital_no'=>'required']);
        $patient = Patient::where('hospital_no', $request->hospital_no)->first();
        if($patient){
            return redirect()->route('patient.service',[$patient->id]);
        }
        return redirect()->route('dashboard');
    }

    public function addService(Request $request,$patientId)
    {
        foreach($request->all() as $key => $value){
            $service = Service::find($key);
            if($service){
                $service->consultancies()->create(['patient_id'=>$patientId,'status'=>'active']);
            }
        }
        return redirect()->route('dashboard');
    }

    public function service ($patientId)
    {
       return view('patient.service',['patient'=>Patient::find($patientId)]);
    }

    public function delete($patientId)
    {
        
        $patient = Patient::find($patientId);
        if($patient){
            $patient->delete();
        }
       
        return redirect()->route('patient.index');
    }

    public function generateHospitalNo()
    {
        for($i=1; $i<=9999; $i++){
            $hospitalNo = substr(date('Y'),2,2).$this->formatNo($i);
            if(Patient::where('hospital_no', $hospitalNo)->first() == null){
                return $hospitalNo;
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