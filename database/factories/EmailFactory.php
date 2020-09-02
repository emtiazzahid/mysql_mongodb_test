<?php

/** @var Factory $factory */

use App\Email;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\Email::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence,
        'from' => $faker->email,
        'to' => $faker->email,
        'template' => $faker->randomHtml()
    ];
});
