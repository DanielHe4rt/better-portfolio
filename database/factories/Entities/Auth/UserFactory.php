<?php

namespace Database\Factories\Entities\Auth;

use App\Entities\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Daniel Reis',
            'email' => 'hey@danielheart.dev',
            'password' => \Illuminate\Support\Facades\Hash::make(env('DEFAULT_PASSWORD')), // password
            'remember_token' => Str::random(10),
        ];
    }
}
