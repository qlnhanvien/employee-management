<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhanVien::query()->delete();

        NhanVien::create([
            'MaNV' => '001',
            'TenNV' => 'Nguyen Van A',
            'Phai' => 1,
            'NgaySinh' => '1990-01-01',
            'DiaChiNV' => '123 Main St',
            'DienThoaiNV' => '0123456789',
        ]);

        NhanVien::create([
            'MaNV' => '002',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '003',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '004',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '005',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '006',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '007',
            'TenNV' => 'Nguyen Van A',
            'Phai' => 1,
            'NgaySinh' => '1990-01-01',
            'DiaChiNV' => '123 Main St',
            'DienThoaiNV' => '0123456789',
        ]);

        NhanVien::create([
            'MaNV' => '008',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '009',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '010',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
        NhanVien::create([
            'MaNV' => '011',
            'TenNV' => 'Tran Thi B',
            'Phai' => 0,
            'NgaySinh' => '1992-02-02',
            'DiaChiNV' => '456 Elm St',
            'DienThoaiNV' => '0987654321',
        ]);
    }
}
