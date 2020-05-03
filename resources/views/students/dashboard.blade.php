@extends('layouts.navbar')
@extends('layouts.preloader')

@section('content')
    <div class="container h-50">
        <div class="row col-md-12 justify-content-center">
            <div>
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="col-md-12">
                        <div class="row d-flex flex-column">
                            <div class="card">
                                <div style="padding-top: 10px" class="mx-auto d-block">
                                    <img src="/ProfileImage/{{ $student->profile_image }}"
                                         style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px;"
                                         class="img-fluid">
                                </div>
                                <div class="card-body mx-auto"><h1>{{ $student->name }}</h1></div>
                            </div>

                            <div class="card">
                                <div class="card-header"><strong>Profile information</strong></div>
                                <!--Ask Hoan to access the avatar cuz i don't know abt his link-->
                                <div class="card-body">
                                    <strong>Student ID</strong>
                                    <p>{{$student->id}}</p>
                                    <strong>Student name</strong>
                                    <P>{{$student->name}}</P>

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
                            <div class="flex-column d-block" style="max-width: 321px">
                                <div class="card">
                                    <div class="card-header">Current classes</div>
                                    @if($classrooms)
                                        @foreach($classrooms as $classroom)
                                            <div class="card">
                                                <div class="card-header">
                                                    Classroom ID: <strong>{{$classroom->id}}</strong> <br>
                                                    Classroom name: <strong>{{$classroom->name}}</strong>
                                                </div>
                                                <div class="card-body">
                                                    Tutor: <strong>{{$classroom->Tutor->name}}</strong>
                                                </div>
                                                <div class="card-footer">
                                                    Created at: <strong>{{$classroom->created_at}}</strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div>Not assign to any class yet</div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-column float-right d-block" style="max-width: 547px">
                                @foreach($comments as $comment)
                                    <div class="card" style="padding-bottom: 10px">
                                        <div class="card-header">
                                            Comment on: <strong>{{$comment->created_at}}</strong>
                                        </div>
                                        <div class="card-body">
                                            This student has commented on post
                                            <strong>{{$comment->Post->id}}</strong>
                                            with the following
                                            content: <strong>"{{$comment->content}}"</strong>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
