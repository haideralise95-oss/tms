<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase;

    public function test_can_get_token()
    {
        $user = User::factory()->create([
            'email' => 'tester@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/auth/token', [
            'email' => 'tester@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }

    public function test_invalid_credentials()
    {
        $response = $this->postJson('/api/auth/token', [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Invalid credentials']);
    }
}
