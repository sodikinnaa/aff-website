<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\Auth\LoginCheck;
use App\Models\User;

class LoginMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_allows_guest_to_access_when_not_authenticated()
    {
        $request = Request::create('/login', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, function () {
            return response('OK', 200);
        });

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getContent());
    }

    /** @test */
    public function it_redirects_admin_to_admin_dashboard_when_authenticated()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $this->be($user);

        $request = Request::create('/login', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, fn () => response('OK', 200));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(url('/admin/dashboard'), $response->headers->get('Location'));
    }

    /** @test */
    public function it_redirects_mitra_to_mitra_dashboard_when_authenticated()
    {
        $user = User::factory()->create(['role' => 'mitra']);
        $this->be($user);

        $request = Request::create('/login', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, fn () => response('OK', 200));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(url('/mitra/dashboard'), $response->headers->get('Location'));
    }

    /** @test */
    public function it_redirects_affiliator_or_other_user_to_user_dashboard_when_authenticated()
    {
        $user = User::factory()->create(['role' => 'affiliator']);
        $this->be($user);

        $request = Request::create('/login', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, fn () => response('OK', 200));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(url('/user/dashboard'), $response->headers->get('Location'));
    }
}
