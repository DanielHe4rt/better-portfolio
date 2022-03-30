<?php

namespace Tests\Feature\Http\Admin\Profile;

use App\Entities\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_profile_page()
    {
        // Prepare
        $this->seed();
        $user = User::factory()->create();

        // Act
        $response = $this->actingAs($user)
            ->get(route('get-profile'));

        // Assert
        $response->assertOk();
        foreach (config('portfolio.base-information') as $field) {
            $response->assertSee($field['value']);
        }
    }

    public function test_admin_can_update_profile_info()
    {
        $this->seed();
        $user = User::factory()->create();
        $payload = [
            'value' => 'danielhe4rt',
            'enabled' => 'on'
        ];
        // Act
        $response = $this->actingAs($user)
            ->put(route('update-profile', ['fieldId' => 1]), $payload);

        // Assert
        $response->assertOk();
        $this->assertDatabaseHas('profile', [
            'value' => 'danielhe4rt'
        ]);
    }
}
