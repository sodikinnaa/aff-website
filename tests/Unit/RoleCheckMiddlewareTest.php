<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class RoleCheckMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware('role:admin')->get('/admin/dashboard', fn() => 'OK');
    }

    /** @test */
    public function it_redirects_if_user_not_logged_in()
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }

    /** @test */
    public function it_blocks_if_role_admin_is_not_allowed()
    {
       
        $user = User::factory()->create(['role' => 'affiliator']); 

        $this->actingAs($user)->get('/admin/dashboard')->assertStatus(403);
    }

    /** @test */
    public function it_allows_admin_role_access()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertStatus(200)
            ->assertSee('OK');
    }

    /** @test */
    public function it_blocks_affiliator_from_admin_dashboard()
    {
        $user = User::factory()->create(['role' => 'affiliator']);

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertStatus(403);
    }

    /** @test */
    public function it_allows_affiliator_route_for_affiliator()
    {
        Route::middleware('role:affiliator')->get('/user/dashboard', fn() => 'Affiliator OK');

        $user = User::factory()->create(['role' => 'affiliator']);

        $this->actingAs($user)
            ->get('/user/dashboard')
            ->assertStatus(200)
            ->assertSee('Affiliator OK');
    }

    /** @test */
    public function it_blocks_admin_accessing_affiliator_route()
    {
        Route::middleware('role:affiliator')->get('/user/dashboard2', fn() => 'Affiliator OK2');

        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
            ->get('/user/dashboard2')
            ->assertStatus(403);
    }

    /** @test */
    public function it_blocks_unauthenticated_user_from_affiliator_route()
    {
        Route::middleware('role:affiliator')->get('/user/dashboard3', fn() => 'Affiliator OK3');

        $this->get('/user/dashboard3')
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_blocks_mitra_from_admin_dashboard()
    {
        $user = User::factory()->create(['role' => 'mitra']);

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertStatus(403);
    }

    /** @test */
    public function it_allows_mitra_access_to_mitra_route()
    {
        Route::middleware('role:mitra')->get('/mitra/dashboard', fn() => 'Mitra OK');

        $user = User::factory()->create(['role' => 'mitra']);

        $this->actingAs($user)
            ->get('/mitra/dashboard')
            ->assertStatus(200)
            ->assertSee('Mitra OK');
    }

    /** @test */
    public function it_blocks_affiliator_from_mitra_route()
    {
        Route::middleware('role:mitra')->get('/mitra/dashboard2', fn() => 'Mitra Only');

        $user = User::factory()->create(['role' => 'affiliator']);

        $this->actingAs($user)
            ->get('/mitra/dashboard2')
            ->assertStatus(403);
    }

    /** @test */
    public function it_blocks_unauthenticated_user_from_mitra_route()
    {
        Route::middleware('role:mitra')->get('/mitra/dashboard3', fn() => 'Mitra Only3');

        $this->get('/mitra/dashboard3')
            ->assertRedirect('/login');
    }

    /** @test */
    public function it_allows_routes_with_multiple_roles()
    {
        Route::middleware('role:admin,affiliator')->get('/combo/dashboard', fn() => 'Combo OK');

        $admin = User::factory()->create(['role' => 'admin']);
        $affiliator = User::factory()->create(['role' => 'affiliator']);
        $mitra = User::factory()->create(['role' => 'mitra']);

        $this->actingAs($admin)
            ->get('/combo/dashboard')
            ->assertStatus(200)
            ->assertSee('Combo OK');

        $this->actingAs($affiliator)
            ->get('/combo/dashboard')
            ->assertStatus(200)
            ->assertSee('Combo OK');

        $this->actingAs($mitra)
            ->get('/combo/dashboard')
            ->assertStatus(403);
    }

    
}
