@extends('layouts.app')

@section('content')
<div>
    <div class="text-centered">
        <div class="card">
            <div class="card-header">
                <!--Ask Hoan to access the avatar cuz i don't know abt his link-->
                Student ID: {{$student->id}}
                Student name: {{$student->name}}
            </div>
            <div class="card-body">
                Student phone: {{$student->phone}}
                Student's userid : {{$student->user_id}}
                Student address: {{$student->address}}
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
@endsection