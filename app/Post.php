<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function Classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
