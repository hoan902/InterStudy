<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function Posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
