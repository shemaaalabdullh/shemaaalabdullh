<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\TagController;

Route::apiResource('tags', TagController::class);


Route::apiResource('products', ProductController::class);


Route::apiResource('categories', CategoryController::class);




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
