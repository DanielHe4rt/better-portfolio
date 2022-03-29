<?php

namespace Database\Factories\Entities\Auth;

use App\Entities\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName . 'He4rt',
            'email' => $this->faker->unique()->email(),
            'password' => $this->faker->password(), // password
            'remember_token' => Str::random(10),
        ];
    }
}
