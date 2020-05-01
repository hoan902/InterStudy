<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];


    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
    public function Student()
    {
        return $this->BelongsTo(Student::class);
    }
    public function Tutor()
    {
        return $this->BelongsTo(Tutor::class);
    }
    public function Chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }
}
