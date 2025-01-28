<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::controller(UserAuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(CarsController::class)->group(function () {
        Route::prefix('/cars')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::put('/{car}', 'update');
            Route::delete('/{car}', 'destroy');
        });
    });
});

Route::get('/login', function () {
    return response()->json(['message' => 'Please login']);
})->name('login');
