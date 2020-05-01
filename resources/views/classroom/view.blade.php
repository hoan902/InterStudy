@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-center">
            <!--Posting section-->
            @if(auth()->user()->user_type !== 'student')
            <div class="col-md-8 pb-5">
                <div class="card">
                    <div class="card-body">
                        <label for="post_content">Post something here</label>
                        <input class="form-control mb-1" type="text" form="postform" name="title" placeholder="What is the title?">
                        <textarea class="form-control mb-2"
                                  id="post_content"
                                  name="postarea"
                                  rows="3"
                                  placeholder="What do you want to say?"
                                  form="postform"></textarea>
                        <form action="/classroom/{{$classroom->id}}/post" method="POST" enctype="multipart/form-data" id="postform">
                            @csrf
                                <button type="submit" class="btn btn-primary mt-2">Post</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <!--Posts display section-->
            <div class="col-md-8 pb-3">
            @foreach($posts as $post)
                <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="h5 m-0">@LeeCross</div>
                                <div class="h7 text-muted">Miracles Lee Cross</div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                    <div class="h6 dropdown-header">Configuration</div>
                                    @if(auth()->user()->user_type != 'student')
                                <a class="dropdown-item" href="/classroom/{{$classroom->id}}/post/{{$post->id}}/delete">Delete Post</a>
                                    <a class="dropdown-item" href="/classroom/{{$classroom->id}}/post/{{$post->id}}/edit">Edit Post</a>
                                    @endif

                                    <a class="dropdown-item" href="#">Something 3</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>{{$post->updated_at}}</div>
                <h2>{{$post->title}}</h2>

                <p class="card-text">
                        {{$post->content}}
                </p>
                </div>
                <div class="card-footer">

                </div>
            </div>
            @endforeach
        </div>

        </div>
    </div>


{{-- <chat :currentuser ="{{ Auth()->user() }}"></chat> --}}
</div>

@endsection
