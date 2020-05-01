<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
