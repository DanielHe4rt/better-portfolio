<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Entities\Auth\User::class, function (Faker $faker) {
    return [
        'name' => 'Daniel Reis',
        'email' => 'hey@danielheart.dev',
        'password' => \Illuminate\Support\Facades\Hash::make(env('DEFAULT_PASSWORD')), // password
        'remember_token' => Str::random(10),
    ];
});
