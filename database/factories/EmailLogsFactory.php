<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\EmailLog::class, function (Faker $faker) {
    return [
        'site_id' => function() {
            return factory(App\Site::class)->create()->id;
        },
        'email_id' => function() {
            return factory(App\Email::class)->create()->id;
        },
        'subscriber_id' => function() {
            return factory(App\Subscriber::class)->create()->id;
        },
        'log' => $faker->paragraph
    ];
});
