<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $guarded = [];


    // public function messages()
    // {
    //     return $this->hasMany(Message::class);
    // }
    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function Messages()
    {
        return $this->hasMany(Message::class);
    }
}
