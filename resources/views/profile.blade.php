@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row h-50 justify-content-center">
            <div class="form-text">
                @if(Auth::user()->user_type == 'tutor')
                    <div class="list-group">
                        <img src="/ProfileImage/{{ Auth::user()->tutor->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ Auth::user()->tutor->name }}</h1>
                    </div>
                @elseif(Auth::user()->user_type == 'student')
                    <div class="list-group">
                        <img src="/ProfileImage/{{ Auth::user()->student->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ Auth::user()->student->name }}</h1>
                    </div>
                @elseif(Auth::user()->user_type == 'staff')
                    <div class="list-group">
                        <img src="/ProfileImage/{{ Auth::user()->staff->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ Auth::user()->staff->name }}</h1>
                    </div>
                @elseif(Auth::user()->user_type == 'admin')
                    <div class="list-group">
                        <img src="/ProfileImage/{{ Auth::user()->admin->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h1>{{ Auth::user()->admin->name }}</h1>
                    </div>
                @endif

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PROFILE</div>

                    <div class="card-body">
                        @if(Auth::user()->user_type == 'tutor')
                            <strong>Name</strong>
                            <p>{{ Auth::user()->tutor->name }}</p>

                            <strong>Role</strong>
                            <p>{{ Auth::user()->user_type }}</p>

                            <strong>phone</strong>
                            <p>{{ Auth::user()->tutor->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ Auth::user()->tutor->address }}</p>

                            <strong>Day Of Birth</strong>
                            <p>{{ Auth::user()->tutor->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ Auth::user()->tutor->gender }}</p>
                            <div><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn" href="/tutors/{{Auth::user()->tutor->id}}/edit">Edit profile</a></div>
                        @elseif(Auth::user()->user_type == 'student')
                            <strong>Name</strong>
                            <p>{{ Auth::user()->student->name }}</p>

                            <strong>Role</strong>
                            <p>{{ Auth::user()->user_type }}</p>

                            <strong>phone</strong>
                            <p>{{ Auth::user()->student->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ Auth::user()->student->address }}</p>

                            <strong>Day Of Birth</strong>
                            <p>{{ Auth::user()->student->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ Auth::user()->student->gender }}</p>
                            <div><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn" href="/students/{{Auth::user()->student->id}}/edit">Edit profile</a></div>
                        @elseif(Auth::user()->user_type == 'staff')
                            <strong>Name</strong>
                            <p>{{ Auth::user()->staff->name }}</p>

                            <strong>Role</strong>
                            <p>{{ Auth::user()->user_type }}</p>

                            <strong>phone</strong>
                            <p>{{ Auth::user()->staff->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ Auth::user()->staff->address }}</p>

                            <strong>Day Of Birth</strong>
                            <p>{{ Auth::user()->staff->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ Auth::user()->staff->gender }}</p>
                            <div><a data-animation="fadeInLeft" data-delay="1.0s" class="btn radius-btn" href="/staffs/{{Auth::user()->staff->id}}/edit">Edit profile</a></div>
                        @elseif(Auth::user()->user_type == 'admin')
                            <strong>Name</strong>
                            <p>{{ Auth::user()->admin->name }}</p>

                            <strong>Role</strong>
                            <p>{{ Auth::user()->user_type }}</p>

                            <strong>phone</strong>
                            <p>{{ Auth::user()->admin->phone }}</p>

                            <strong>Address</strong>
                            <p>{{ Auth::user()->admin->address }}</p>

                            <strong>Day Of Birth</strong>
                            <p>{{ Auth::user()->admin->DoB }}</p>

                            <strong>Gender</strong>
                            <p>{{ Auth::user()->admin->gender }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
