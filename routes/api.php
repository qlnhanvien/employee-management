<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::post('register', [AuthController::class, 'registerApi'])->name("registerApi");
Route::post('login', [AuthController::class, 'loginApi'])->name("loginApi");

Route::middleware('auth:api')->group(function () {
    Route::get('/hehe', function () {
        return "true";
    });
});
Route::get('dashboardApi', [AdminController::class, 'dashboardApi'])->name('dashboardApi');
