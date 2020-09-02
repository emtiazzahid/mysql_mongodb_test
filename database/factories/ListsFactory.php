<?php

/** @var Factory $factory */

use App\Lists;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Lists::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->uuid,
        'name' => $faker->title
    ];
});
