@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Students list</h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul>
                                @forelse($Student as $students)
                                    <li>
                                        <strong>
                                            <a href="/students/{{$students->id}}">{{ $students->name }}</a>
                                        </strong>({{ $students->phone }})
                                    </li>
                                @empty
                                    <p>No student to show</p>
                                @endforelse
                            </ul>
                    </div>
                </div>
                <button href="/students/create"> Create new Student</button>
            </div>
        </div>
    </div>
@endsection
