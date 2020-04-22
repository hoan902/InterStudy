<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatroom;
use Faker\Generator as Faker;

$factory->define(Chatroom::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'classroom_id' => factory(\App\Classroom::class),
        'status' => $faker->boolean,
    ];
});
