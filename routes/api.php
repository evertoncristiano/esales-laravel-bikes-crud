<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BikesController;

Route::group(['prefix' => 'bikes'], function() {
    Route::get('/', [BikesController::class, 'index']);
    Route::get('/{id}', [BikesController::class, 'show']);
    Route::post('/', [BikesController::class, 'store']);
    Route::put('/{id}', [BikesController::class, 'update']);
    Route::delete('/{id}', [BikesController::class, 'destroy']);
    Route::patch('/{id}', [BikesController::class, 'updateDescription']);
});


