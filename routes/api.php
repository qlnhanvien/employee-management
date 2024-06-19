<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\NhanVienController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'registerApi'])->withoutMiddleware([\App\Http\Middleware\UserAuthen::class]);;
Route::post('login', [AuthController::class, 'loginApi'])->withoutMiddleware([\App\Http\Middleware\UserAuthen::class]);

Route::middleware('auth:api')->group(function () {
    Route::get('dashboardApi', [AdminController::class, 'dashboardApi']);

    Route::prefix('nhanvien')->group(function () {
        Route::get('/getAll', [NhanVienController::class, 'getAll']);
        Route::get('/getId/{MaNV}', [NhanVienController::class, 'getID']);
        Route::post('/create', [NhanVienController::class, 'create']);
        Route::post('/update/{MaNV}', [NhanVienController::class, 'update']);
        Route::delete('/delete/{MaNV}', [NhanVienController::class, 'delete']);
    });

});


