<?php

use App\Http\Controllers\InvestmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group.
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    // Investment Routes
    Route::post('/investments/create', [InvestmentController::class, 'store']); // Create investment
    Route::get('/investments', [InvestmentController::class, 'index']); // Get all investments
    Route::get('/investments/{id}', [InvestmentController::class, 'show']); // Get investment by ID
    Route::put('/investments/{id}', [InvestmentController::class, 'update']); // Update investment
    Route::delete('/investments/{id}', [InvestmentController::class, 'destroy']); // Delete investment
});

// Sample public route (if needed)
Route::get('/public-data', function () {
    return response()->json(['message' => 'Public API endpoint']);
});