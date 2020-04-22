<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Chatroom;

class Message extends Model
{
    protected $guarded = [];

     public function Chatrooms()
     {
         return $this->belongsTo(Chatroom::class);
     }
    public function Users()
    {
        return $this->belongsTo(\App\User::class);
    }
}
