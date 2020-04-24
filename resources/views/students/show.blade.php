@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Student Detail</h4></div>

                    <div class="card-body">
                        <strong>Name</strong>
                        <p>{{ $Student->name}}</p>

                        <strong>phone</strong>
                        <p>{{ $Student->phone }}</p>

                        <strong>Address</strong>
                        <p>{{ $Student->address }}</p>
                        <a  href="/students">Back to students page</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
