<?php

namespace Tests\Feature;

use App\Models\Translation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslationSearchTest extends TestCase
{
    // use RefreshDatabase;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     $user = User::factory()->create();
    //     $this->actingAs($user, 'sanctum');
    // }

    // public function test_can_search_translations_by_key_and_tag()
    // {
    //     $translation = Translation::factory()->create([
    //         'key' => 'auth.login',
    //         'locale_code' => 'en',
    //         'content' => 'Login',
    //     ]);

    //     $translation->tags()->create(['tag' => 'web']);

    //     $response = $this->getJson('/api/translations/search?key=login&tag=web');

    //     $response->assertStatus(200)
    //              ->assertJsonFragment(['key' => 'auth.login']);
    // }
}
