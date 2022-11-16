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
                <th>SERVICE</th>
                <th></th>
            </tr>
            @include('patient.create')
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
                            <button class="btn btn-warning">Send Invesgation</button>
                            <button class="btn btn-success">Prescribe the Patient</button>
                            <button class="btn btn-primary">Mark as Recovered</button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endif
    @endsection
