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
        return $this->hasMany(Student::class);
    }
    public function Tutor()
    {
        return $this->hasMany(Tutor::class);
    }
    public function Chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }
}
