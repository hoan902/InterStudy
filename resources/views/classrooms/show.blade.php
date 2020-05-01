@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-25">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3><strong>[{{ $classroom->name }}]</strong> details</h3></div>
                    <div class="card-body justify-content-center">
                        <div class="card-group ">
                            <ul>
                                <li class="text-heading">
                                    Class name: <strong>[{{ $classroom->name}}]</strong>
                                </li>
                                <li class="text-lg-left">
                                    <img src="/ProfileImage/{{ $classroom->tutor->profile_image }}" style="width: 50px; height:50px; float: left; border-radius: 50%; margin-right: 25px;">
                                    <strong>Tutor of this class:</strong>
                                    <p>{{ $classroom->tutor->name }}</p>
                                </li>
                                <li class="text-lg-left">
                                    <img src="/ProfileImage/{{ $classroom->student->profile_image }}" style="width: 50px; height:50px; float: left; border-radius: 50%; margin-right: 25px;">
                                    <strong>Student of this class:</strong>
                                    <p>{{ $classroom->student->name }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
