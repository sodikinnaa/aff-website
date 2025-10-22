<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginServiceTest extends TestCase
{
    use RefreshDatabase;

    protected AuthService $authService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authService = new AuthService();
    }

    /** @test */
    public function it_returns_false_when_user_not_found()
    {
        $result = $this->authService->attemptLogin('notfound@example.com', 'password123');
        $this->assertFalse($result['success']);
    }

    /** @test */
    public function it_returns_false_when_password_is_wrong()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('correctpassword'),
            'role' => 'admin'
        ]);

        $result = $this->authService->attemptLogin('user@example.com', 'wrongpassword');
        $this->assertFalse($result['success']);
    }

    /** @test */
    public function it_returns_true_and_role_when_login_with_email()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'admin'
        ]);

        $result = $this->authService->attemptLogin('user@example.com', 'secret123');
        $this->assertTrue($result['success']);
        $this->assertEquals($user->id, $result['user']->id);
        $this->assertEquals('admin', $result['role']);
    }

    /** @test */
    public function it_returns_true_and_role_when_login_with_username()
    {
        $user = User::factory()->create([
            'username' => 'myusername',
            'password' => Hash::make('testpass'),
            'role' => 'mitra'
        ]);

        $result = $this->authService->attemptLogin('myusername', 'testpass');
        $this->assertTrue($result['success']);
        $this->assertEquals($user->id, $result['user']->id);
        $this->assertEquals('mitra', $result['role']);
    }

    /** @test */
    public function it_returns_true_and_role_when_login_with_whatsapp()
    {
        $user = User::factory()->create([
            'whatsapp' => '628888888888',
            'password' => Hash::make('wasecret'),
            'role' => 'affiliator'
        ]);

        $result = $this->authService->attemptLogin('628888888888', 'wasecret');
        $this->assertTrue($result['success']);
        $this->assertEquals($user->id, $result['user']->id);
        $this->assertEquals('affiliator', $result['role']);
    }
}
