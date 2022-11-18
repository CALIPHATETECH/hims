@extends('layouts.app')
@section('title')
    {{$patient->name}} medical report
@endsection

@section('content')
<div class="card-body shadow">
<h5 class="text text-primary text-center">Updated Medical Report for {{$patient->name}}</h5>
<div class="row">
    <div class="col-md-6">
        <table>
            <tr>
                <td>Name</td>
                <td>{{$patient->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$patient->email}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{$patient->address}}</td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>{{$patient->contact}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    @foreach($patient->consultancies as $consultancy)
    <div class="col-md-4">
        <h6 class="text text-center">Consulted On {{$consultancy->service->name}}</h6>
    </div>
    <div class="col-md-7">
        <h6 class="text text-center">Investigations</h6>
        @foreach($consultancy->investigations as $investigation)
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <p class="text text-center">Test</p>
                    <p>{{$investigation->test->name}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <p class="text text-center">Result</p>
                    <p>{{$investigation->result->content}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    @endforeach
</div>
</div>
@endsection
