<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\AgencyController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HolderController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/holders', HolderController::class);
    Route::apiResource('/accounts', AccountController::class);
    Route::apiResource('/agencys', AgencyController::class);

    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('index', [AuthController::class, 'index']);
    });
});

Route::get('/unauthenticate', function () {
    return response()->json(['Não autenticado'],403);
})->name('unauthenticate');
