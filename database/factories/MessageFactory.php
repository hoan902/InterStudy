<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'chatroom_id' => factory(\App\Chatroom::class),
        'user_id' => factory(\App\User::class),
        'status' => $faker->boolean,
    ];
});
