<?php

use App\Http\Controllers\CarsController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CarsController::class)->group(function () {
    Route::prefix('/cars')->group(function ()
    {
        Route::get('/', [CarsController::class, 'index']);

        Route::post('/', [CarsController::class, 'store'])
            ->withoutMiddleware(VerifyCsrfToken::class);

        Route::put('/{car}', [CarsController::class, 'update'])
            ->withoutMiddleware(VerifyCsrfToken::class);
    });
});



