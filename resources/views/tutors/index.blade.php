@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="h-50">
        <div class="card">
            <div class="card-header"><h3>Tutors list</h3></div>
            <div class="card-body col-auto table-responsive text-nowrap">
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
