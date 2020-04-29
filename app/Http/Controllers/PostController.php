<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function delete(Post $post)
    {
        $post->delete();
        return back();
    }
    public function edit(Classroom $classroom, Post $post)
    {
        return view('classroom.edit',compact('post'))->with(compact('classroom'));
    }
    public function update(Classroom $classroom, Post $post)
    {
        $post->title = request()->title;
        $post->content = request()->postarea;
        $post->save();
        return redirect('/classroom/'.$classroom->id);
    }
}
