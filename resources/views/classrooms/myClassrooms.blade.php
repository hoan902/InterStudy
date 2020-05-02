@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-25">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>My classrooms</h3></div>
                    <div class="card-body table-bordered table-responsive text-nowrap">
                        <table style="width:100%" class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>Class Name</th>
                                <th>Class Tutor</th>
                                <th>Class Student</th>
                            </tr>
                            @forelse($classroom as $classrooms)
                                @if(Auth::user()->user_type == 'tutor')
                                    @if($classrooms->tutor_id === Auth::user()->tutor->id)
                                        <tr>
                                            <td>
                                                <strong>
                                                    {{ $classrooms->id }}
                                                </strong>
                                            </td>
                                            <td>
                                                <a href="/classroom/{{$classrooms->id}}"
                                                   class="btn-link">{{ $classrooms->name }}</a>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $classrooms->tutor->name }}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $classrooms->student->name }}
                                                </strong>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                                    @if(Auth::user()->user_type == 'student')
                                        @if($classrooms->student_id === Auth::user()->student->id)
                                            <tr>
                                                <td>
                                                    <strong>
                                                        {{ $classrooms->id }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <a href="/classroom/{{$classrooms->id}}"
                                                       class="btn-link">{{ $classrooms->name }}</a>
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $classrooms->tutor->name }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $classrooms->student->name }}
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endif
                                @endif
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
