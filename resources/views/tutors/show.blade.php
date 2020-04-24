@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Tutor Detail</h4></div>

                    <div class="card-body">
                        <strong>Name</strong>
                        <p>{{ $tutorID->name}}</p>

                        <strong>phone</strong>
                        <p>{{ $tutorID->phone }}</p>

                        <strong>Address</strong>
                        <p>{{ $tutorID->address }}</p>
                        <a  href="/tutors">Back to tutor page</a>
                        <a href="/tutors/{{$tutorID->id}}/edit">Edit student info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
