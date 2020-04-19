<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }
}
