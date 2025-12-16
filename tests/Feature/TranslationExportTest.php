<?php

namespace Tests\Feature;

use App\Models\Translation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslationExportTest extends TestCase
{
    // use RefreshDatabase;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     $user = User::factory()->create();
    //     $this->actingAs($user, 'sanctum');
    // }

    // public function test_export_returns_json()
    // {
    //     $translation = Translation::factory()->create([
    //         'key' => 'auth.login',
    //         'locale_code' => 'en',
    //         'content' => 'Login',
    //     ]);

    //     $translation->tags()->create(['tag' => 'web']);

    //     $response = $this->get('/api/translations/export?locale=en');

    //     $response->assertStatus(200)
    //              ->assertHeader('Content-Type', 'application/json')
    //              ->assertSee('auth.login');
    // }
}
