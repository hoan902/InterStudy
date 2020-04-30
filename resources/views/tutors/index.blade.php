@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row h-50">
            <div class="col-sm-12 my-auto">
            <ul>
                @forelse($Tutor as $tutors)
                    <li>
                            <a class="btn-link" href="/tutors/{{$tutors->id}}">{{ $tutors->name }} </a>({{ $tutors->phone }})
                    </li>
                @empty
                    <p>No Tutor to show</p>
                @endforelse
            </ul>
            </div>
        </div>
    </div>
@endsection
