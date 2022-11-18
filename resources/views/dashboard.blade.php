@extends('layouts.app')
    @section('menu')
        
    @endsection
    @section('content')

    @if(Auth::user()->role == 'admin')
    <form action="{{route('patient.verify')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="hospital_no" class="form-control col-md-8" placeholder=" Enter Hospital No">
            </div>
            <div class="col-md-4">
            <button class="btn btn-dark col-md-4">Verify</button>
            </div>
        </div>
    </form>
    @elseif(Auth::user()->role == 'doctor')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>HOSPITAL NO</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>CONTACT</th>
                <th>SERVICE APPLIED FOR</th>
                <th>TESTS</th>
                <th></th>
                <th></th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(Auth::user()->staff->staffServices as $staffService)
                @foreach($staffService->service->consultancies->where('status','active') as $consultancy)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$consultancy->patient->name}}</td>
                        <td>{{$consultancy->patient->hospital_no}}</a></td>
                        <td>{{$consultancy->patient->gender}}</td>
                        <td>{{$consultancy->patient->address}}</td>
                        <td>{{$consultancy->patient->contact}}</td>
                        <td>{{$consultancy->service->name}}</td>
                        <td>
                        @foreach($consultancy->patient->investigations as $investigation)
                            @if($investigation->result_id == null)
                                {{$investigation->test->name}} Investigation Awaiting
                            @else
                                <b>Result</b><br>{{$investigation->result->content}}
                            @endif
                            
                        @endforeach
                        </td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#send_{{$consultancy->patient->id}}">Send Invesgation</button>
                            @include('patient.investigation')
                        </td>
                        <td>
                            <button class ="btn btn-info">View Medical Hostory</button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    @elseif(Auth::user()->role == 'lab')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <td>TEST</td>
                <th>NAME</th>
                <th>HOSPITAL NO</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>CONTACT</th>
                <th></th>
                <th></th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Investigation::all() as $investigation)
               
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$investigation->test->name}}</td>
                    <td>{{$investigation->patient->name}}</td>
                    <td>{{$investigation->patient->hospital_no}}</a></td>
                    <td>{{$investigation->patient->gender}}</td>
                    <td>{{$investigation->patient->address}}</td>
                    <td>{{$investigation->patient->contact}}</td>
                    <td>
                    @if($investigation->result)
                        Conducted
                    @else
                        <button class="btn btn-warning" data-toggle="modal" data-target="#result_{{$investigation->id}}">Send Result</button>
                        @include('patient.result')
                    @endif
                    </td>
                    
                </tr>
               
            @endforeach
        </tbody>
    </table>

    @endif
    @endsection
