<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/show', 'show');
        Route::patch('/logout', 'logout');
        Route::patch('/change-password', 'changePassword');
        Route::patch('/change-name', 'changeName');
    });
    Route::apiResource('customers', CustomerController::class);
});

