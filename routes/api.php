<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatbotController;
use App\Http\Controllers\API\UserController;

// *|--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------*/

// Chatbot API routes
Route::prefix('chatbot')->group(function () {
    Route::post('/ask', [ChatbotController::class, 'ask']);
    Route::get('/topics', [ChatbotController::class, 'getAvailableTopics']);
});

// Versioning (v1)
Route::prefix('v1')->group(function () {
    Route::prefix('chatbot')->group(function () {
        Route::post('/ask', [ChatbotController::class, 'ask']);
        Route::get('/topics', [ChatbotController::class, 'getAvailableTopics']);
    });
});

// Auth route
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('master/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::get('/roles-units', [UserController::class, 'getRolesAndUnits']);
    Route::get('/{id}', [UserController::class, 'show']); // ✅ tambahkan ini
});
