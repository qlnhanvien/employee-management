<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NhanVienController;

# Frontend Routes

//Route::get('login', [AuthController::class, 'login'])->name('login');
//Route::post('login', [AuthController::class, 'postLogin']);
//
//Route::get('register', [AuthController::class, 'register'])->name('register');
//Route::post('register', [AuthController::class, 'postRegister']);
//
//Route::get('forgot-password', [AuthController::class, 'forgot'])->name('forgot-password');
//Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
//Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
//Route::post('reset-password/{token}', [AuthController::class, 'reset'])->name('password.update');

# Admin
//Route::middleware(['auth'])->group(function () {
//    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//
//    # NhanVien
//    Route::prefix('nhanvien')->group(function () {
//        Route::get('/', [NhanVienController::class, 'index'])->name('admin.nhanvien.index');
//        Route::get('/create', [NhanVienController::class, 'create'])->name('admin.nhanvien.create');
//        Route::post('/store', [NhanVienController::class, 'store'])->name('admin.nhanvien.store');
//        Route::get('/edit/{MaNV}', [NhanVienController::class, 'edit'])->name('admin.nhanvien.edit');
//        Route::post('/update/{MaNV}', [NhanVienController::class, 'update'])->name('admin.nhanvien.update');
//        Route::delete('/delete/{MaNV}', [NhanVienController::class, 'delete'])->name('admin.nhanvien.delete');
//    });
//
//    Route::prefix('nhanvien')->group(function () {
//        Route::get('/', [NhanVienController::class, 'index'])->name('admin.nhanvien.index');
//        Route::get('/create', [NhanVienController::class, 'create'])->name('admin.nhanvien.create');
//        Route::post('/store', [NhanVienController::class, 'store'])->name('admin.nhanvien.store');
//        Route::get('/edit/{MaNV}', [NhanVienController::class, 'edit'])->name('admin.nhanvien.edit');
//        Route::post('/update/{MaNV}', [NhanVienController::class, 'update'])->name('admin.nhanvien.update');
//        Route::delete('/delete/{MaNV}', [NhanVienController::class, 'delete'])->name('admin.nhanvien.delete');
//    });
//
//});
