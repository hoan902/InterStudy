@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h3>List of Classrooms</h3></div>

                    <div class="card-body col-auto table-responsive text-nowrap">
                        <table style="width:100%" class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>Class Name</th>
                            </tr>
                            @forelse($Classroom as $classrooms)
                                <td>
                                    <strong>
                                        {{ $classrooms->id }}
                                    </strong>
                                </td>
                                <td>
                                    <a href="/classrooms/{{$classrooms->id}}">{{ $classrooms->name }}</a>
                                </td>
                            @empty
                                <p>No classrooms to show</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
