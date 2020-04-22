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
    public function Students()
    {
        return $this->hasOne(Student::class);
    }
    public function Tutors()
    {
        return $this->hasOne(Tutor::class);
    }
    public function Chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }
}
