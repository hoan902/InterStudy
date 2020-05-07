@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="h-50">
        <div class="card">
            <div class="card-header"><h3>Staffs list</h3></div>
            <div class="card-body col-auto table-responsive text-nowrap">
                <ul>
                    @forelse($Staff as $staffs)
                        <li>
                            <strong>
                                <a class="btn-link" href="/staffs/{{$staffs->id}}">{{ $staffs->name }}</a>
                            </strong>({{ $staffs->phone }})
                        </li>
                    @empty
                        <p>No staff to show</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
