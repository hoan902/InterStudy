@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container">
        <div class="row justify-content-center">
            <!--Posting section-->
            <div class="col-md-8 pb-5">
                <div class="card">
                    <div class="card-body">
                        <label for="post_content">Post something here</label>
                        <input value="{{$post->title}}" class="form-control mb-1" type="text" form="postform" name="title" placeholder="What is the title?">
                        <textarea class="form-control mb-2" 
                                id="post_content" 
                                name="postarea" 
                                rows="3" 
                                placeholder="What do you want to say?"
                                form="postform">{{$post->content}}</textarea>
                        <form action="/classroom/{{$classroom->id}}/post/{{$post->id}}/update" method="POST" enctype="multipart/form-data" id="postform">
                                @csrf    
                                <button type="submit" class="btn btn-primary mt-2">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection