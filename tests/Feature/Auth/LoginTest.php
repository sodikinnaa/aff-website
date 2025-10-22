<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    use RefreshDatabase;

    /** @test */
    public function it_can_display_login_page()
    {
        // Clear any previous output buffers before the request
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');

        // Ensure all output buffers are closed after the request
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
    }

    /** @test */
    public function it_login_with_affiliator_role_and_redirect_to_user_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'sodikin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'affiliator'
        ]);

        $response = $this->post('/login', [
            'username' => 'sodikin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_login_with_mitra_role_and_redirect_to_mitra_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'sodikin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'mitra'
        ]);

        $response = $this->post('/login', [
            'username' => 'sodikin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('mitra.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_login_with_admin_role_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'sodikin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'sodikin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_can_login_with_email_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'sodikin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'sodikin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_can_login_with_username_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'username' => 'sodikinnnaa',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'sodikinnnaa',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_can_login_with_whatsapp_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'whatsapp' => '6288275426716',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => '6288275426716',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

     /** @test */
    public function login_fails_with_invalid_password()
    {
         $user = User::factory()->create([
             'username' => 'user1',
             'password' => Hash::make('password123'),
             'role' => 'admin', // Use a valid role value for the role column constraint
         ]);

         $response = $this->post('/login', [
             'username' => 'user1',
             'password' => 'wrongpassword',
         ]);

         $response->assertSessionHasErrors(['username']);
         $this->assertGuest();
    }

    
 
     
}
