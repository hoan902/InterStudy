@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Student Detail</h4></div>

                    <div class="card-body">
                        <img src="/ProfileImage/{{ $studentID->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ $studentID->user->email }} Profile</h1>
                        <div class="card-columns">
                            <strong>Name</strong>
                            <p>{{ $studentID->name}}</p>

                            <strong>phone</strong>
                            <p>{{ $studentID->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ $studentID->address }}</p>

                            <strong>Day of Birth</strong>
                            <p>{{ $studentID->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ $studentID->gender }}</p>
                        </div>

                        <a class="btn btn-primary" style="float: inherit" href="/students">Back to students page</a>
                        <a class="btn btn-success" style="float: right" href="/students/{{$studentID->id}}/edit">Edit student info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
