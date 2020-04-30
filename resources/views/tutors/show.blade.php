@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Tutor Detail</h4></div>

                    <div class="card-body">
                        <img src="/ProfileImage/{{ $tutorID->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h2 style="float: top">{{ $tutorID->user->email }} Profile</h2>
                        <div class="card-group">
                            <ul>
                                <li>
                                    <strong>Name</strong>
                                    <p>{{ $tutorID->name}}</p>
                                </li>
                                <li>
                                    <strong>phone</strong>
                                    <p>{{ $tutorID->phone }}</p>
                                </li>
                                <li>
                                    <strong>Address</strong>
                                    <p>{{ $tutorID->address }}</p>
                                </li>

                                <li>
                                    <strong>Day of Birth</strong>
                                    <p>{{ $tutorID->DoB }}</p>
                                </li>

                                <li>
                                    <strong>Gender</strong>
                                    <p>{{ $tutorID->gender }}</p>
                                </li>
                            </ul>
                        </div>

                        <a class="btn btn-primary" style="float: inherit" href="/tutors">Back to tutor page</a>
                        <a class="btn btn-success" style="float: right" href="/tutors/{{$tutorID->id}}/edit">Edit tutor info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
