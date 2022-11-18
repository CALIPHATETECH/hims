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
            @include('department..service.create')
        </thead>
        <tbody>
            @foreach($department->services as $service)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$service->name}}</td>
                    <td>{{count($service->consultancies)}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$service->id}}">Edit</button>
                        <a href="{{route('department.service.delete',[$department->id, $service->id])}}" onclick="return confirm('Are you sure, you want to delete this healthcare service?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('department.service.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
