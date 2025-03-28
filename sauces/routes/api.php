<?php
use App\Http\Controllers\Api\SauceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routes publiques (si besoin)
Route::get('/sauces', [SauceApiController::class, 'index']);
Route::get('/sauces/{sauce}', [SauceApiController::class, 'show']);

// Routes protégées par authentification (nécessite Sanctum ou Passport)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sauces', [SauceApiController::class, 'store']);
    Route::put('/sauces/{sauce}', [SauceApiController::class, 'update']);
    Route::delete('/sauces/{sauce}', [SauceApiController::class, 'destroy']);
});
