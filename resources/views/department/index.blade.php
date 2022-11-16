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
                <th>HEALTHCARE SERVICES</th>
                <th><button data-toggle="modal" data-target="#addDepartment" class="btn btn-primary"><b>+</b></button></th>
            </tr>
            @include('department.create')
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$department->name}}</td>
                    <td><a href="{{route('department.service.index',[$department->id])}}">{{count($department->services)}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$department->id}}">Edit</button>
                        <a href="{{route('department.delete',$department->id)}}" onclick="return confirm('Are you sure, you want to delete this department?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('department.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
