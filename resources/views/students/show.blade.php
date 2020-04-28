@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Student Detail</h4></div>

                    <div class="card-body">
                        <img src="/ProfileImage/{{ $studentID->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h2 style="float: top">{{ $studentID->user->email }} Profile</h2>
                            <div class="card-group">
                                <ul>
                                    <li>
                                        <strong>Name</strong>
                                        <p>{{ $studentID->name}}</p>
                                    </li>
                                    <li>
                                        <strong>phone</strong>
                                        <p>{{ $studentID->phone }}</p>
                                    </li>
                                    <li>
                                        <strong>Address</strong>
                                        <p>{{ $studentID->address }}</p>
                                    </li>

                                    <li>
                                        <strong>Day of Birth</strong>
                                        <p>{{ $studentID->DoB }}</p>
                                    </li>

                                    <li>
                                        <strong>Gender</strong>
                                        <p>{{ $studentID->gender }}</p>
                                    </li>
                                </ul>
                            </div>
                        <a class="btn btn-primary" style="float: inherit" href="/students">Back to students page</a>
                        <a class="btn btn-success" style="float: right" href="/students/{{$studentID->id}}/edit">Edit student info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
