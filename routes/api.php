<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'registerApi']);
Route::post('login', [AuthController::class, 'loginApi']);
Route::get('/test', function () {
    return 'Hello World';
});

