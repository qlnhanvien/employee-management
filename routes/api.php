<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\NhanVienController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'registerApi'])->name("registerApi")->withoutMiddleware([\App\Http\Middleware\UserAuthen::class]);;
Route::post('login', [AuthController::class, 'loginApi'])->name("loginApi")->withoutMiddleware([\App\Http\Middleware\UserAuthen::class]);

Route::middleware('auth:api')->group(function () {
    Route::get('dashboardApi', [AdminController::class, 'dashboardApi'])->name('dashboardApi');

    Route::prefix('nhanvien')->group(function () {
        Route::get('/', [NhanVienController::class, 'index'])->name('admin.nhanvien.index');
        Route::get('/create', [NhanVienController::class, 'create'])->name('admin.nhanvien.create');
        Route::post('/store', [NhanVienController::class, 'store'])->name('admin.nhanvien.store');
        Route::get('/edit/{MaNV}', [NhanVienController::class, 'edit'])->name('admin.nhanvien.edit');
        Route::post('/update/{MaNV}', [NhanVienController::class, 'update'])->name('admin.nhanvien.update');
        Route::delete('/delete/{MaNV}', [NhanVienController::class, 'delete'])->name('admin.nhanvien.delete');
    });
});


