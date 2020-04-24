@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Tutor list</h3></div>

                    <div class="card-body">
                            <ul>
                                @forelse($Tutor as $tutors)
                                    <li>
                                        <strong>
                                            <a href="/tutors/{{$tutors->id}}">{{ $tutors->name }}</a>
                                        </strong>({{ $tutors->phone }})
                                    </li>
                                @empty
                                    <p>No Tutor to show</p>
                                @endforelse
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
