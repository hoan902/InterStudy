<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tutor;
use Faker\Generator as Faker;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'user_id' => factory(\App\User::class),
        'status' => $faker->boolean,
    ];
});
