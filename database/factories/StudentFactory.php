<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'user_id' => factory(\App\User::class),
        'status' => $faker->boolean,
        'profile_image' => $faker->image(),
        'DoB' => $faker->date(),
        'gender' => $faker->sentence,
    ];
});
