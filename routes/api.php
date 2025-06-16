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
| assigned to the "api" middleware group.
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/investments/create', [InvestmentController::class, 'store']);
    Route::get('/investments', [InvestmentController::class, 'index']);
    Route::get('/investments/{id}', [InvestmentController::class, 'show']);
    Route::put('/investments/{id}', [InvestmentController::class, 'update']);
    Route::delete('/investments/{id}', [InvestmentController::class, 'destroy']);
}); 

// Sample public route
Route::get('/public-data', function () {
    return response()->json(['message' => 'Public API endpoint']);
});