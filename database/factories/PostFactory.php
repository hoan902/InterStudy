<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'classroom_id' => factory(\App\Classroom::class),
        'user_id' => factory(\App\User::class),
        'status' => $faker->boolean,
    ];
});
