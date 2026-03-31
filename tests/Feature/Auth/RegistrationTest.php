<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $user = \App\Models\User::first();

        $this->assertAuthenticatedAs($user, 'web');
        $response->assertRedirect(route('frontend.index', absolute: false));
    }

    public function test_new_admins_can_register_via_admin_route(): void
    {
        $response = $this->post('/admin/register', [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $admin = \App\Models\User::where('email', 'admin@example.com')->first();

        $this->assertTrue($admin->is_admin);
        $this->assertAuthenticatedAs($admin, 'admin');
        $response->assertRedirect(route('admin.dashboard', absolute: false));
    }
}
