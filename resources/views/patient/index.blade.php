@extends('layouts.app')
    @section('title')
        departments
    @endsection
    @section('content')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>HOSPITAL NO</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>CONTACT</th>
                <th>NEXT OF KIN CONTACT</th>
                <th><button data-toggle="modal" data-target="#addPatient" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('patient.create')
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->hospital_no}}</a></td>
                    <td>{{$patient->gender}}</a></td>
                    <td>{{$patient->address}}</a></td>
                    <td>{{$patient->contact}}</a></td>
                    <td>{{$patient->next_of_kin_contact}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$patient->id}}">Edit</button>
                        <a href="{{route('patient.delete',[$patient->id])}}" onclick="return confirm('Are you sure, you want to delete this patient?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('patient.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
