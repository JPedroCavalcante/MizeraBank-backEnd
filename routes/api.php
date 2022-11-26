<?php

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HolderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class]);
    Route::post('logout', [AuthController::class]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/holders', HolderController::class);
Route::apiResource('/accounts', AccountController::class);
