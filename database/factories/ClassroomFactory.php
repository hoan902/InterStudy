<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Classroom;
use Faker\Generator as Faker;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'tutor_id' => factory(\App\Tutor::class),
        'student_id' => factory(\App\Student::class),
        'status' => $faker->boolean,
    ];
});
