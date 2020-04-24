@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Staffs list</h3></div>

                    <div class="card-body">
                            <ul>
                                @forelse($Staff as $staffs)
                                    <li>
                                        <strong>
                                            <a href="/staffs/{{$staffs->id}}">{{ $staffs->name }}</a>
                                        </strong>({{ $staffs->phone }})
                                    </li>
                                @empty
                                    <p>No staff to show</p>
                                @endforelse
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
