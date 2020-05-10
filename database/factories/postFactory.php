<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\category;
use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'category_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull
    ];
});
