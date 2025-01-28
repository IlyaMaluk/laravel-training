<?php

use App\Http\Controllers\CarsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(CarsController::class)->group(function () {
    Route::prefix('/cars')->group(function () {
        Route::get('/', [CarsController::class, 'index']);
        Route::post('/', [CarsController::class, 'store']);
        Route::put('/{car}', [CarsController::class, 'update']);
        Route::delete('/{car}', [CarsController::class, 'destroy']);
    });
});
