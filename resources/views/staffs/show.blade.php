@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Staff Detail</h4></div>

                    <div class="card-body">
                        <img src="/ProfileImage/{{ $staffID->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ $staffID->user->email }} Profile</h1>
                        <div class="card-columns">
                            <strong>Name</strong>
                            <p>{{ $staffID->name}}</p>

                            <strong>phone</strong>
                            <p>{{ $staffID->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ $staffID->address }}</p>

                            <strong>Day of Birth</strong>
                            <p>{{ $staffID->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ $staffID->gender }}</p>
                        </div>
                        <a class="btn btn-primary" style="float: inherit" href="/staffs">Back to staffs page</a>
                        <a class="btn btn-primary" style="float: right" href="/staffs/{{$staffID->id}}/edit">Edit staff info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
