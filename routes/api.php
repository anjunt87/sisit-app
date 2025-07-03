<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatbotController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RolesController;
use App\Http\Controllers\API\UnitsController;
use App\Http\Controllers\API\YayasanController;



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

Route::prefix('master/users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
    Route::get('/roles-units', 'getRolesAndUnits');
    Route::get('/{id}', 'show');
});


Route::prefix('master/roles')->controller(RolesController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
    Route::get('/{id}', 'show');
    Route::get('roles-permissions', [RolesController::class, 'getPermissions']);
    Route::get('roles-dropdown', [RolesController::class, 'getRolesForDropdown']);
});


Route::prefix('master/units')->group(function () {
    Route::get('/', [UnitsController::class, 'index']);
    Route::post('/', [UnitsController::class, 'store']);
    Route::put('/{id}', [UnitsController::class, 'update']);
    Route::delete('/{id}', [UnitsController::class, 'destroy']);
    Route::get('/{id}', [UnitsController::class, 'show']);
    Route::get('/dropdown/all', [UnitsController::class, 'getUnitsForDropdown']);
    Route::get('/dropdown/yayasan', [UnitsController::class, 'getYayasanForDropdown']);
});

Route::prefix('master/yayasan')->group(function () {
    Route::get('/', [YayasanController::class, 'index']);
    Route::post('/', [YayasanController::class, 'store']);
    Route::put('/{id}', [YayasanController::class, 'update']);
    Route::delete('/{id}', [YayasanController::class, 'destroy']);
    Route::get('/{id}', [YayasanController::class, 'show']);
    Route::get('/dropdown', [YayasanController::class, 'getDropdown']);
});
