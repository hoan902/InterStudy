<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    public function Post()
    {
        return $this->hasMany(Post::class);
    }
    public function Student()
    {
        return $this->hasOne(Student::class);
    }
    public function Tutor()
    {
        return $this->hasOne(Tutor::class);
    }
    public function Chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }
}
