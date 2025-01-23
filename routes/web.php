<?php

use App\Http\Controllers\CarsController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CarsController::class)->group(function () {
    Route::get('/cars', [CarsController::class, 'index']);

    Route::post('/cars', [CarsController::class, 'store'])
        ->withoutMiddleware(VerifyCsrfToken::class);

    Route::put('/cars/{car}', [CarsController::class, 'update'])
        ->withoutMiddleware(VerifyCsrfToken::class);
});



