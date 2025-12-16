<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use App\Services\TranslationService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TranslationController extends Controller
{
    protected TranslationService $service;
    
    public function __construct(TranslationService $service)
    {
        $this->service = $service;
    }

        public function export(Request $request): StreamedResponse
    {
        $locale = $request->query('locale', 'en');
        $tag = $request->query('tag');

        return response()->stream(function () use ($locale, $tag) {
            echo '{';
            $first = true;

            Translation::query()
                ->select('key', 'content')
                ->where('locale_code', $locale)
                ->when($tag, fn ($q) =>
                    $q->whereHas('tags', fn ($t) => $t->where('tag', $tag))
                )
                ->orderBy('id')
                ->chunk(1000, function ($rows) use (&$first) {
                    foreach ($rows as $row) {
                        if (! $first) {
                            echo ',';
                        }

                        echo json_encode($row->key)
                            . ':'
                            . json_encode($row->content);

                        $first = false;
                    }
                });

            echo '}';
        }, 200, [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'public, max-age=300',
        ]);
    }

    public function store(TranslationRequest $request)
    {
        $translation = $this->service->create($request->validated());

        return response()->json($translation, 201);
    }

    public function update(TranslationRequest $request, Translation $translation)
    {
        $translation = $this->service->update($translation, $request->validated());

        return response()->json($translation);
    }

    public function show(Translation $translation)
    {
        return response()->json($translation->load('tags'));
    }

    public function destroy(Translation $translation)
    {
        $this->service->delete($translation);

        return response()->json(['message' => 'Translation deleted']);
    }

        public function search(Request $request)
    {
        $query = Translation::query()->with('tags');

        if ($request->filled('locale')) {
            $query->where('locale_code', $request->locale);
        }

        if ($request->filled('key')) {
            $query->where('key', 'like', '%' . $request->key . '%');
        }

        if ($request->filled('content')) {
            $query->whereFullText('content', $request->content);
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('tag', $request->tag));
        }

        // Pagination for performance
        $perPage = min($request->query('per_page', 50), 500);

        $results = $query->orderBy('id')->paginate($perPage);

        return response()->json($results);
    }


}
