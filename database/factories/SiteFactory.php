<?php

/** @var Factory $factory */

use App\Site;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'site_url' => $faker->unique()->ean8 . $faker->domainName,
    ];
});
