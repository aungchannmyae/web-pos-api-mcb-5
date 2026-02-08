<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("category", CategoryController::class);

Route::apiResource("menu", MenuController::class);
