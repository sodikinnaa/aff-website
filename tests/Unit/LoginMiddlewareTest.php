<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Http\Request;
use App\Http\Middleware\Auth\LoginCheck;
use App\Models\User;
class LoginMiddlewareTest extends TestCase
{
    #[Test]
    public function test_redirect_admin_to_login_if_not_logged_in()
    {
        $request = Request::create('/dashboard', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, function () {
            return response('Next');
        });

        $this->assertEquals(302, $response->getStatusCode());
    }

    #[Test]
    public function test_admin_passes_if_logged_in()
    {
        // Create a dummy user without actually persisting to the database to avoid "no such table" SQL error
        $user = User::factory()->make();

        // Simulate logged in user
        $this->be($user);

        $request = Request::create('/dashboard', 'GET');
        $middleware = new LoginCheck;

        $response = $middleware->handle($request, function () {
            return response('Next');
        });

        $this->assertEquals('Next', $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
