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

                    @elseif(Auth::user()->user_type == 'staff')
                        <div class="card-body table-bordered table-responsive text-nowrap">
                            <h4 class="text-center"> Accessing other student dashboard list</h4>
                            <table style="width:100%" class="table table-responsive-lg">
                                <tr>
                                    <th>id</th>
                                    <th>Student Name</th>
                                    <th>Student Class</th>
                                    <th>Assigned Tutor</th>
                                </tr>
                                @forelse($student as $students)
                                    <tr>
                                        <td>
                                            <strong>
                                                {{$students->id}}
                                            </strong>
                                        </td>
                                        <td>
                                            <a class="btn-link" href="/dashboard/{{$students->id}}">{{ $students->name }}</a>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $students->classroom->name }}
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $students->classroom->tutor->name }}
                                            </strong>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No student to show</p>
                                @endforelse
                            </table>
                        </div>
{{--                    @elseif(Auth::user()->user_type == 'student')--}}
{{--                        <div class="col-md-12">--}}

{{--                            <div class="row d-flex flex-column">--}}
{{--                                <div class="card">--}}
{{--                                    <div style="padding-top: 10px" class="mx-auto d-block">--}}
{{--                                        <img src="/ProfileImage/{{ $student->profile_image }}"--}}
{{--                                             style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;"--}}
{{--                                             class="img-fluid">--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body mx-auto"><h1>{{ $student->name }}</h1></div>--}}
{{--                                </div>--}}

{{--                                <div class="card">--}}
{{--                                    <div class="card-header"><strong>Profile information</strong></div>--}}
{{--                                    <!--Ask Hoan to access the avatar cuz i don't know abt his link-->--}}
{{--                                    <div class="card-body">--}}
{{--                                        <strong>Student ID</strong>--}}
{{--                                        <p>{{$student->id}}</p>--}}
{{--                                        <strong>Student name</strong>--}}
{{--                                        <P>{{$student->name}}</P>--}}

{{--                                        <strong>Student phone</strong>--}}
{{--                                        <P>{{$student->phone}}</P>--}}

{{--                                        <strong>Student's userid</strong>--}}
{{--                                        <P>{{$student->user_id}}</P>--}}

{{--                                        <strong>Student address</strong>--}}
{{--                                        <P>{{$student->address}}</P>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="mx-auto flex-column d-block">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">Current classes</div>--}}
{{--                                        @if($classrooms)--}}
{{--                                            @foreach($classrooms as $classroom)--}}
{{--                                                <div class="card">--}}
{{--                                                    <div class="card-header">--}}
{{--                                                        Classroom ID: <strong>{{$classroom->id}}</strong> <br>--}}
{{--                                                        Classroom name: <strong>{{$classroom->name}}</strong>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        Tutor: <strong>{{$classroom->Tutor->name}}</strong>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="card-footer">--}}
{{--                                                        Created at: <strong>{{$classroom->created_at}}</strong>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <div>Not assign to any class yet</div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="mx-auto flex-column d-block">--}}
{{--                                    @foreach($comments as $comment)--}}
{{--                                        <div class="card" style="padding-bottom: 10px">--}}
{{--                                            <div class="card-header">--}}
{{--                                                Comment on: <strong>{{$comment->created_at}}</strong>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                This student has commented on post--}}
{{--                                                <strong>{{$comment->Post->id}}</strong>--}}
{{--                                                with the following--}}
{{--                                                content: <strong>"{{$comment->content}}"</strong>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
