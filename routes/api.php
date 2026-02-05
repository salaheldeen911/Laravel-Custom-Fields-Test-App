<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'as' => 'api.v1.'], function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('products', ProductController::class);
});
