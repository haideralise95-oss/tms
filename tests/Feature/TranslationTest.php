<?php

namespace Tests\Feature;

use App\Models\Translation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslationTest extends TestCase
{
    // use RefreshDatabase;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     // Create and authenticate a user
    //     $user = User::factory()->create();
    //     $this->actingAs($user, 'sanctum');
    // }


    // public function test_can_view_translation()
    // {
    //     $translation = Translation::factory()->create();

    //     $response = $this->getJson("/api/translations/{$translation->id}");

    //     $response->assertStatus(200)
    //              ->assertJsonFragment(['id' => $translation->id]);
    // }

}
