@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container">
        <div class="row h-50">
            <div class="col-sm-12 my-auto">
                <div class="header-area"><h3>Students list</h3></div>
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
