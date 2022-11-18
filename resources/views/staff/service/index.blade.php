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
                <th>CONSULTANCIES</th>
                <th><button data-toggle="modal" data-target="#addDepartment" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('staff.service.create')
        </thead>
        <tbody>
            @foreach($staff->staffServices as $staffService)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$staffService->service->name}}</td>
                    <td>{{count($staffService->service->consultancies)}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$staffService->id}}">Edit</button>
                        <a href="{{route('department.service.delete',[$staff->id, $staffService->id])}}" onclick="return confirm('Are you sure, you want to delete this staff service?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('staff.service.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
