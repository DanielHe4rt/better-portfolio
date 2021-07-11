<?php

namespace Database\Factories\Entities\Auth;

use App\Entities\Auth\User;
use App\Entities\Helpers\Access;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Access::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_agent' => $this->faker->userAgent,
            'ip' => $this->faker->ipv4,
            'created_at' => $this->faker->dateTimeBetween('now',\Carbon\Carbon::now()->addDays(5)->format('U')),
            'updated_at' => $this->faker->dateTimeBetween('now',\Carbon\Carbon::now()->addDays(5)->format('U')),
        ];
    }
}

