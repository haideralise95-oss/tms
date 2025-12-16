<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        Translation::factory()
            ->count(100_000)
            ->create()
            ->chunk(1000)
            ->each(function ($chunk) {
                $tags = [];

                foreach ($chunk as $translation) {
                    $tags[] = [
                        'translation_id' => $translation->id,
                        'tag' => 'web',
                    ];
                    $tags[] = [
                        'translation_id' => $translation->id,
                        'tag' => 'mobile',
                    ];
                }

                DB::table('translation_tags')->insert($tags);
            });
    }
}
