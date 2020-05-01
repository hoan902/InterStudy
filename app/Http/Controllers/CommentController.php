<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComment(Post $post){
        return Comment::with('User')->where('post_id',$post->id)->get();
    }
    public function postComment(Post $post){
        $post = $post->Comments()->create([
            'content' => request()->content,
            'user_id' => auth()->user()->id
        ]);
        return $post;
    }
    public function delComment(Post $post,Comment $comment){
        $comment->delete();
    }

}
