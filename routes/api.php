<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TranslationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/auth/token', [AuthController::class, 'token']);
Route::middleware('auth:sanctum')->group(function () {

    // 
    Route::post('/translations', [TranslationController::class, 'store']);
    Route::put('/translations/{translation}', [TranslationController::class, 'update']);
    // Route::get('/translations/{translation}', [TranslationController::class, 'show']);
    Route::delete('/translations/{translation}', [TranslationController::class, 'destroy']);

    // Search
    Route::get('/translations/search', [TranslationController::class, 'search']);

    Route::get('/translations/export', [TranslationController::class, 'export']);
});
