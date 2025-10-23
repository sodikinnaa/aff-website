<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Admin\WebsiteModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Siapkan user admin untuk login
        $this->adminUser = User::factory()->create([
            'role' => 'admin',
        ]);
    }

    /** @test */
    public function admin_can_view_website_index()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/setting/website');

        $response->assertStatus(200);
        $response->assertSee('Daftar Website');
    }

    /** @test */
    public function admin_can_create_a_new_website()
    {
        $payload = [
            'name' => 'Contoh Website',
            'url' => 'https://contohwebsite.com'
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/setting/website', $payload);

        $response->assertRedirect(route('admin.website'));
        $this->assertDatabaseHas('website', [
            'nama_web' => 'Contoh Website',
            'url' => 'https://contohwebsite.com'
        ]);
    }

    /** @test */
    public function admin_can_update_website()
    {
        $website = WebsiteModel::create([
            'nama_web' => 'Lama',
            'url' => 'https://lama.com',
        ]);

        $payload = [
            'id' => $website->id,
            'name' => 'Baru',
            'url' => 'https://baru.com'
        ];

        $response = $this->actingAs($this->adminUser)
            ->put('/admin/setting/website', $payload);

        $response->assertRedirect(route('admin.website'));
        $this->assertDatabaseHas('website', [
            'id' => $website->id,
            'nama_web' => 'Baru',
            'url' => 'https://baru.com',
        ]);
    }

    /** @test */
    public function admin_can_delete_website()
    {
        $website = WebsiteModel::create([
            'nama_web' => 'To be deleted',
            'url' => 'https://tobedeleted.com',
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete("/admin/setting/website/{$website->id}");

        $response->assertRedirect(route('admin.website'));
        $this->assertDatabaseMissing('website', [
            'id' => $website->id,
        ]);
    }

    /** @test */
    public function guest_cannot_access_admin_websites()
    {
        $response = $this->get('/admin/setting/website');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function affiliator_user_cannot_access_website_routes()
    {
        // Create a user with a role != admin
        $user = User::factory()->create([
            'role' => 'affiliator', // assuming 'user' is a valid non-admin role
        ]);

        // List of routes to test (GET index, GET add, GET edit, POST store, PUT update, DELETE destroy)
        $routes = [
            ['method' => 'get', 'uri' => '/admin/setting/website'],
            ['method' => 'get', 'uri' => '/admin/setting/website/add'],
            ['method' => 'get', 'uri' => '/admin/setting/website/edit/1'],
            ['method' => 'post', 'uri' => '/admin/setting/website', 'data' => ['name'=>'X','url'=>'https://x.com']],
            ['method' => 'put', 'uri' => '/admin/setting/website', 'data' => ['id'=>1,'name'=>'XX','url'=>'https://xx.com']],
            ['method' => 'delete', 'uri' => '/admin/setting/website/1'],
        ];

        foreach ($routes as $route) {
            $method = $route['method'];
            $uri = $route['uri'];
            $data = $route['data'] ?? [];

            $response = $this->actingAs($user)->$method($uri, $data);

            // Assuming forbidden responses for non-admins (either 403 or redirect)
            $response->assertForbidden();
        }
    }

    /** @test */
    public function mitra_user_cannot_access_website_routes()
    {
        // Create a user with a role != admin
        $user = User::factory()->create([
            'role' => 'mitra', // assuming 'user' is a valid non-admin role
        ]);

        // List of routes to test (GET index, GET add, GET edit, POST store, PUT update, DELETE destroy)
        $routes = [
            ['method' => 'get', 'uri' => '/admin/setting/website'],
            ['method' => 'get', 'uri' => '/admin/setting/website/add'],
            ['method' => 'get', 'uri' => '/admin/setting/website/edit/1'],
            ['method' => 'post', 'uri' => '/admin/setting/website', 'data' => ['name'=>'X','url'=>'https://x.com']],
            ['method' => 'put', 'uri' => '/admin/setting/website', 'data' => ['id'=>1,'name'=>'XX','url'=>'https://xx.com']],
            ['method' => 'delete', 'uri' => '/admin/setting/website/1'],
        ];

        foreach ($routes as $route) {
            $method = $route['method'];
            $uri = $route['uri'];
            $data = $route['data'] ?? [];

            $response = $this->actingAs($user)->$method($uri, $data);

            // Assuming forbidden responses for non-admins (either 403 or redirect)
            $response->assertForbidden();
        }
    }
}
