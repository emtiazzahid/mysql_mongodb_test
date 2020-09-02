<?php

/** @var Factory $factory */

use App\Subscriber;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Subscriber::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'site_id' => function() {
            return factory(App\Site::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address' => $faker->address
    ];
});
