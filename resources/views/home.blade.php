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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    @if(Auth::user()->user_type === 'tutor')
                        <div class="card-body table-bordered table-responsive text-nowrap">
                            <h4 class="text-center">{{ Auth::user()->tutor->name }} Personal Tutees list</h4>
                            {{--Search bar--}}
                            <div class="col-md-4">
                                <form action="/dashboard/search" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control">
                                        <span class="input-group">
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
                    @elseif(Auth::user()->user_type == 'student')
                        <div >
                            <div class="text-centered">
                                <div class="form-text">
                                    <img src="/ProfileImage/{{ $student->profile_image }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;">
                                </div>
                                <div class="card">
                                    <div class="form-control-plaintext">
                                        <!--Ask Hoan to access the avatar cuz i don't know abt his link-->
                                        <strong>Student ID</strong>
                                        <p>{{$student->id}}</p>
                                        <strong>Student name</strong>
                                       <P>{{$student->name}}</P>

                                    </div>
                                    <div class="form-control-plaintext">
                                        <strong>Student phone</strong>
                                        <P>{{$student->phone}}</P>

                                        <strong>Student's userid</strong>
                                        <P>{{$student->user_id}}</P>

                                        <strong>Student address</strong>
                                        <P>{{$student->address}}</P>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if($classrooms)
                                    @foreach($classrooms as $classroom)
                                        <div class="card col-3">
                                            <div class="card-header">
                                                Classroom ID: {{$classroom->id}}
                                                Classroom name: {{$classroom->name}}
                                            </div>
                                            <div class="card-body">
                                                Tutor: {{$classroom->Tutor->name}}
                                            </div>
                                            <div class="card-footer">
                                                Created_at: {{$classroom->created_at}};
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div>Not assign to any class yet</div>
                                @endif
                            </div>
                            @foreach($comments as $comment)
                                <div class="card">
                                    <div class="card-header">
                                        {{$comment->created_at}}
                                    </div>
                                    <div class="card-body">
                                        This student has commented on post {{$comment->Post->id}} with the following content: {{$comment->content}}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
