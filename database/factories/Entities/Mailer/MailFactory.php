<?php

namespace Database\Factories\Entities\Mailer;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Entities\Mailer\Mail;

class MailFactory extends Factory
{
    protected $model = Mail::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'email' => $this->faker->unique()->email(),
            'name' => $this->faker->firstName(),
            'subject' => $this->faker->sentence(3),
            'content' => $this->faker->sentence(),
            'status_id' => 2,
            'ip' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent()
        ];
    }
}
