<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'user_id' => User::all()->random()->id,
        'body' => $faker->paragraph(random_int(10, 25)),
        'rating' => $faker->randomFloat(null, 1, 10),
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null),
    ];
});
