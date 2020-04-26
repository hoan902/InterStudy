@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Tutor Detail</h4></div>

                    <div class="card-body">
                        <img src="/ProfileImage/{{ $tutorID->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ $tutorID->user->email }} Profile</h1>
                        <div class="card-columns">
                            <strong>Name</strong>
                            <p>{{ $tutorID->name}}</p>

                            <strong>phone</strong>
                            <p>{{ $tutorID->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ $tutorID->address }}</p>

                            <strong>Day of Birth</strong>
                            <p>{{ $tutorID->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ $tutorID->gender }}</p>
                        </div>

                        <a class="btn btn-primary" style="float: inherit" href="/tutors">Back to tutor page</a>
                        <a class="btn btn-success" style="float: right" href="/tutors/{{$tutorID->id}}/edit">Edit tutor info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
