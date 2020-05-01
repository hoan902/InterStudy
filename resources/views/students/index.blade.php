@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="h-50">
        <div class="card">
            <div class="card-header"><h3>Students list</h3></div>
            <div class="card-body col-auto table-responsive text-nowrap">
                <ul>
                    @forelse($Student as $students)
                        <li>
                            <a class="btn-link" href="/students/{{$students->id}}">{{ $students->name }}</a>({{ $students->phone }})
                        </li>
                    @empty
                        <p>No student to show</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
