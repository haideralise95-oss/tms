<?php

namespace App\Services;

use App\Models\Translation;
use App\Models\TranslationTag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    public function create(array $data): Translation
    {
        return DB::transaction(function () use ($data) {
            $translation = Translation::create([
                'key' => $data['key'],
                'locale_code' => $data['locale_code'],
                'content' => $data['content'],
            ]);

            if (!empty($data['tags'])) {
                $tags = array_map(fn($tag) => ['tag' => $tag], $data['tags']);
                $translation->tags()->createMany($tags);
            }

            Cache::tags('translations')->flush();

            return $translation;
        });
    }

    public function update(Translation $translation, array $data): Translation
    {
        return DB::transaction(function () use ($translation, $data) {
            $translation->update([
                'key' => $data['key'],
                'locale_code' => $data['locale_code'],
                'content' => $data['content'],
            ]);

            if (isset($data['tags'])) {
                $translation->tags()->delete();
                $tags = array_map(fn($tag) => ['tag' => $tag], $data['tags']);
                $translation->tags()->createMany($tags);
            }

            Cache::tags('translations')->flush();

            return $translation;
        });
    }

    public function delete(Translation $translation): void
    {
        DB::transaction(function () use ($translation) {
            $translation->tags()->delete();
            $translation->delete();
            Cache::tags('translations')->flush();
        });
    }
}
