@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Staff Detail</h4></div>

                    <div class="card-body">
                        <strong>Name</strong>
                        <p>{{ $staffID->name}}</p>

                        <strong>phone</strong>
                        <p>{{ $staffID->phone }}</p>

                        <strong>Address</strong>
                        <p>{{ $staffID->address }}</p>
                        <a  href="/staffs">Back to staffs page</a>
                        <a href="/staffs/{{$staffID->id}}/edit">Edit staff info</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
