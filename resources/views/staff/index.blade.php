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
                <th>GENDER</th>
                <th>EMAIL</th>
                <th>PHONE NO</th>
                <th>ADDRESS</th>
                <th>STAFF ID</th>
                <th>DEPARTMENT</th>
                <th>ROLE</th>
                <th>SERVICES</th>
                
                <th><button data-toggle="modal" data-target="#addPatient" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('staff.create')
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$staff->name}}</td>
                    <td>{{$staff->staff->gender ?? ''}}</td>
                    <td>{{$staff->email}}</a></td>
                    <td>{{$staff->staff->contact ?? ''}}</a></td>
                    <td>{{$staff->staff->address ?? ''}}</a></td>
                    <td>{{$staff->staff->staff_id ?? ''}}</td>
                    <td>{{$staff->staff->department->name ?? ''}}</td>
                    <td>{{$staff->role ?? ''}}</td>
                    <td><a href="{{route('staff.service.index',[$staff->staff->id ?? '0'])}}">{{count($staff->staff->staffServices ?? [])}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$staff->id}}">Edit</button>
                        <a href="{{route('staff.delete',[$staff->id])}}" onclick="return confirm('Are you sure, you want to delete this staff?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('staff.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
