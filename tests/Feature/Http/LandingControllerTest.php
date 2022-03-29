<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
