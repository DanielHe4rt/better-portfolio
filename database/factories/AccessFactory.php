<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Entities\Helpers\Access;
use Faker\Generator as Faker;

$factory->define(Access::class, function (Faker $faker) {
    return [
        'user_agent' => $faker->userAgent,
        'ip' => $faker->ipv4,
        'created_at' => $faker->dateTimeBetween('now',\Carbon\Carbon::now()->addDays(5)->format('U')),
        'updated_at' => $faker->dateTimeBetween('now',\Carbon\Carbon::now()->addDays(5)->format('U')),
    ];
});
