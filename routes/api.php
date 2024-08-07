<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\NhanVienController;
use App\Http\Controllers\api\QuyetDinhTuyenDungController;
use App\Http\Controllers\api\QuanLyChamCongController;
use \App\Http\Controllers\api\QuanLyChucVuController;
use App\Http\Middleware\UserAuthen;
use \App\Http\Controllers\api\QuanLiBaoHiemController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'registerApi'])->withoutMiddleware([UserAuthen::class]);
Route::post('login', [AuthController::class, 'loginApi'])->withoutMiddleware([UserAuthen::class]);
Route::post('sendMail', [AuthController::class, 'sendResetLinkEmail'])->withoutMiddleware([UserAuthen::class]);
Route::post('reset-password/{token}', [AuthController::class, 'resetPassword'])->withoutMiddleware([UserAuthen::class]);

Route::middleware('auth:api')->group(function () {
    Route::get('dashboardApi', [AdminController::class, 'dashboardApi']);
    Route::get('export', [AdminController::class, 'export']);

    Route::prefix('nhanvien')->group(function () {
        Route::get('/getAll', [NhanVienController::class, 'getAll']);
        Route::get('/getId/{MaNV}', [NhanVienController::class, 'getID']);
        Route::post('/create', [NhanVienController::class, 'create']);
        Route::post('/update/{MaNV}', [NhanVienController::class, 'update']);
        Route::delete('/delete/{MaNV}', [NhanVienController::class, 'delete']);
    });

    Route::prefix('QDTD')->group(function () {
        Route::get('/getAll', [QuyetDinhTuyenDungController::class, 'getAll']);
        Route::get('/getId/{MaQDTD}', [QuyetDinhTuyenDungController::class, 'getID']);
        Route::post('/create', [QuyetDinhTuyenDungController::class, 'create']);
        Route::post('/update/{MaQDTD}', [QuyetDinhTuyenDungController::class, 'update']);
        Route::delete('/delete/{MaQDTD}', [QuyetDinhTuyenDungController::class, 'delete']);
    });

    Route::prefix('QLBCC')->group(function () {
        Route::get('/getAll', [QuanLyChamCongController::class, 'getAll']);
        Route::get('/getId/{MaNV}/{MaBCC}', [QuanLyChamCongController::class, 'getID']);
        Route::post('/create', [QuanLyChamCongController::class, 'create']);
        Route::post('/update/{MaNV}/{MaBCC}', [QuanLyChamCongController::class, 'update']);
        Route::delete('/delete/{MaNV}/{MaBCC}', [QuanLyChamCongController::class, 'delete']);
    });

    Route::prefix('QLCV')->group(function () {
        Route::get('/getAll', [QuanLyChucVuController::class, 'getAll']);
        Route::get('/getId/{MaCV}', [QuanLyChucVuController::class, 'getID']);
        Route::post('/create', [QuanLyChucVuController::class, 'create']);
        Route::post('/update/{MaCV}', [QuanLyChucVuController::class, 'update']);
        Route::delete('/delete/{MaCV}', [QuanLyChucVuController::class, 'delete']);
    });

    Route::prefix('QLBH')->group(function () {
        Route::get('/getAll', [QuanLiBaoHiemController::class, 'getAll']);
        Route::get('/getId/{MaBH}', [QuanLiBaoHiemController::class, 'getID']);
        Route::post('/create', [QuanLiBaoHiemController::class, 'create']);
        Route::post('/update/{MaBH}', [QuanLiBaoHiemController::class, 'update']);
        Route::delete('/delete/{MaBH}', [QuanLiBaoHiemController::class, 'delete']);
    });

    Route::prefix('proFile')->group(function () {
        Route::get('/get', [AdminController::class, 'getProfile']);
        Route::post('/update', [AdminController::class, 'updateProfile']);
    });

    Route::post('logout', [AuthController::class, 'logout']);
});
