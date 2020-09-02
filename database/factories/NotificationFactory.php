<?php

/** @var Factory $factory */

use App\Email;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\Notification::class, function (Faker $faker) {
    return [
        'type' => $faker->word,
        'notification_type' => $faker->word,
        'notifiable_id' => $faker->uuid,
        'data' => $faker->paragraph
    ];
});
