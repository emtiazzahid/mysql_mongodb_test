<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\EmailLog::class, function (Faker $faker) {
    return [
        'log' => $faker->paragraph
    ];
});
