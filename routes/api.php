<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatbotController;

// *|--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------*/

// Chatbot routes
Route::prefix('chatbot')->group(function () {
    Route::post('/ask', [ChatbotController::class, 'ask']);
    Route::get('/topics', [ChatbotController::class, 'getAvailableTopics']);
});

// Alternative route structure for versioning
Route::prefix('v1')->group(function () {
    Route::prefix('chatbot')->group(function () {
        Route::post('/ask', [ChatbotController::class, 'ask']);
        Route::get('/topics', [ChatbotController::class, 'getAvailableTopics']);
    });
});

// Health check route
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
        'service' => 'Chatbot API'
    ]);
});
Route::post('/login', [AuthController::class, 'login']);
