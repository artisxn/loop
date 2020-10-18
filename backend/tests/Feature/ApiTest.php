<?php

namespace Tests\Feature;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiRequiresAuth()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(401);
    }

    public function testUserCanAuthenticate()
    {
        $password = 'password';

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        $response = $this->call(
            'GET',
            '/api/products',
            [],
            [],
            [],
            ['PHP_AUTH_USER' => $user->email, 'PHP_AUTH_PW' => $password]
        );

        $response->assertStatus(200);
    }
}
