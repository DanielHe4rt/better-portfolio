<?php

namespace Tests\Feature\Http;

use App\Mail\ContactMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LandingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_see_a_base_portfolio()
    {
        // Prepare
        $this->seed();

        // Act
        $response = $this->get(route('landing'));

        // Assert
        $response->assertOk();
        foreach (config('portfolio.base-information') as $field) {
            $response->assertSee($field['value']);
        }
        foreach (config('portfolio.worked-places') as $field) {
            $response->assertSee($field['company_name']);
        }
    }

    public function test_guest_can_send_email()
    {
        // Prepare
        Mail::fake();
        $payload = [
            'email' => 'hey@danielheart.dev',
            'name' => 'Daniel Reis',
            'subject' => 'Hey dude',
            'content' => 'I totally miss you (8',
        ];

        // Act
        $response = $this->post(route('post-mail'), $payload);

        // Assert
        Mail::assertSent(ContactMail::class);
        $response->assertOk();
    }
}
