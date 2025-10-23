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
            'email' => 'userfirst@example.com',
            'password' => Hash::make('password123'),
            'role' => 'affiliator'
        ]);

        $response = $this->post('/login', [
            'username' => 'userfirst@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_login_with_mitra_role_and_redirect_to_mitra_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'userfirst@example.com',
            'password' => Hash::make('password123'),
            'role' => 'mitra'
        ]);

        $response = $this->post('/login', [
            'username' => 'userfirst@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('mitra.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_login_with_admin_role_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'userfirst@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'userfirst@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_can_login_with_email_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'userfirst@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'userfirst@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_can_login_with_username_and_redirect_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'username' => 'userfirstnnaa',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'username' => 'userfirstnnaa',
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


    // unit test login rediret to admin and user page 
    /** @test */
    /** @test */
    public function admin_is_redirected_to_admin_dashboard_when_accessing_login_page_authenticated()
    {
        $admin = User::factory()->create([
            'username' => 'adminuser',
            'password' => Hash::make('passwordAdm1n'),
            'role' => 'admin',
        ]);
        $this->actingAs($admin);

        $response = $this->get('/login', ['HTTP_REFERER' => '/']);

        $response->assertRedirect('/admin/dashboard');
    }

    /** @test */
    public function affiliator_is_redirected_to_user_dashboard_when_accessing_login_page_authenticated()
    {
        $affiliator = User::factory()->create([
            'username' => 'affiluser',
            'password' => Hash::make('passwordAff1l'),
            'role' => 'affiliator',
        ]);
        $this->actingAs($affiliator);

        $response = $this->get('/login');
        $response->assertRedirect('/user/dashboard');
    }

    /** @test */
    public function mitra_is_redirected_to_mitra_dashboard_when_accessing_login_page_authenticated()
    {
        $mitra = User::factory()->create([
            'username' => 'mitrauser',
            'password' => Hash::make('passwordM1tra'),
            'role' => 'mitra',
        ]);
        $this->actingAs($mitra);

        $response = $this->get('/login');
        $response->assertRedirect('/mitra/dashboard');
    }

    /** @test */
    public function guest_can_access_login_page()
    {
        $response = $this->get('/login');
        $response->assertOk();
    }

    
 
     
}
