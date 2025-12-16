<?php

namespace Database\Factories;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    protected $model = Translation::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->unique()->slug(3),
            'locale_code' => $this->faker->randomElement(['en', 'fr', 'es']),
            'content' => $this->faker->sentence(),
        ];
    }
}
