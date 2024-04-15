<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/{id}', 'show');
    Route::post('/products', 'store');
    Route::put('/products/{id}', 'update');
    Route::delete('/products/{id}', 'destroy');
});

