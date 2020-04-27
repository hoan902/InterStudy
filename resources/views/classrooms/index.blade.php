@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>List of Classrooms</h3></div>

                    <div class="card-body">
                        <ul>
                            @forelse($Classroom as $classrooms)
                                <li>
                                    <strong>
                                        <a href="/classrooms/{{$classrooms->id}}">{{ $classrooms->name }}</a>
                                    </strong>
                                </li>
                            @empty
                                <p>No classrooms to show</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
