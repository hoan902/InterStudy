<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    public function send(Request $request){

        
        $user = User::find(Auth::id());
        event(new ChatEvent($user,$request->message));

        return $request->all();
    }
    // public function send(){

    //     $message="Hello";
    //     $user = User::find(Auth::id());
    //     event(new ChatEvent($message,$user));
    // }
    public function fetch()
    {
        return Message::with('user')->get();
    }

}
