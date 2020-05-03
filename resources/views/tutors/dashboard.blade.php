@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-50">
        <div class="text-lg-center text-heading text-dark">
            @if(Auth::user()->user_type == 'staff')
                Welcome Back {{ Auth::user()->staff->name }}!
            @elseif(Auth::user()->user_type == 'student')
                Welcome Back {{ Auth::user()->student->name }}!
            @elseif(Auth::user()->user_type == 'tutor')
                Welcome Back {{ Auth::user()->tutor->name }}!
            @elseif(Auth::user()->user_type == 'admin')
                Welcome Back {{ Auth::user()->admin->name }}!
            @endif
        </div>
        <div class="row col-md-12 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @if(Auth::user()->user_type === 'tutor')
                        <div class="card-body table-bordered table-responsive text-nowrap">
                            <h4 class="text-center">{{ Auth::user()->tutor->name }} Personal Tutees list</h4>
                            {{--Search bar--}}
                            <div class="col-md-12">
                                <form action="/dashboard/search" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control" style="height: 60px">
                                        <span>
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            {{--Class table--}}
                            <div>
                                <table style="width:100%" class="table table-striped">
                                    <tr>
                                        <th>id</th>
                                        <th>Class Name</th>
                                        <th>Class Tutor</th>
                                        <th>Class Student</th>
                                    </tr>
                                    @forelse($classroom as $classrooms)
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
                                    @empty
                                        <p>No classrooms to show</p>
                                    @endforelse
                                </table>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center pt-4">
                                        {{ $classroom->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
