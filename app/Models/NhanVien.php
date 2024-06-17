<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NhanVien extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'NhanVien';

    protected $fillable = [
        'MaNV',
        'HoTen',
        'GioiTinh',
        'NgaySinh',
        'SDT',
        'Email',
        'DiaChi',
    ];

    public static function generateMaNV()
    {
        $lastNhanVien = DB::table('NhanVien')->orderBy('MaNV', 'desc')->first();

        if (!$lastNhanVien) {
            return 'NV-001';
        }

        $lastIdNumber = (int)Str::after($lastNhanVien->MaNV, 'NV-');
        $newIdNumber = $lastIdNumber + 1;
        return 'NV-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
    }

    public function chiTietBangChamCongs()
    {
        return $this->hasMany(ChiTietBangChamCong::class, 'MaNV', 'MaNV');
    }

    public function khenThuongKyLuatCaNhans()
    {
        return $this->hasMany(KhenThuong_KyLuatCaNhan::class, 'MaNV', 'MaNV');
    }

    public function bangChamCongs()
    {
        return $this->hasMany(BangChamCong::class, 'MaNV', 'MaNV');
    }

    public function chiTietPhuTros()
    {
        return $this->hasMany(ChiTietPhuTro::class, 'MaNV', 'MaNV');
    }

    public function baoHiems()
    {
        return $this->hasMany(BaoHiem::class, 'MaNV', 'MaNV');
    }

    public function chiTietQuyetDinhChucVus()
    {
        return $this->hasMany(ChiTietQuyetDinhChucVu::class, 'MaNV', 'MaNV');
    }

    public function hopDongs()
    {
        return $this->hasMany(HopDong::class, 'MaNV', 'MaNV');
    }

    public function khenThuongKyLuatTapThes()
    {
        return $this->hasMany(KhenThuong_KyLuatTapThe::class, 'MaNV', 'MaNV');
    }

    public function chucVus()
    {
        return $this->belongsToMany(ChucVu::class, 'ChiTietQuyetDinhChucVu', 'MaNV', 'MaChucVu');
    }

    public function phieuGhiNhanPhuTros()
    {
        return $this->hasMany(PhieuGhiNhanPhuTro::class, 'MaNV', 'MaNV');
    }

    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'MaPhongBan', 'MaPhongBan');
    }

    public function phuCapLuongs()
    {
        return $this->hasMany(PhuCap_Luong::class, 'MaNV', 'MaNV');
    }

    public function quyetDinhChucVus()
    {
        return $this->hasMany(QuyetDinhChucVu::class, 'MaNV', 'MaNV');
    }

    public function quyetDinhKhenThuongKyLuat()
    {
        return $this->hasMany(QuyetDinhKhenThuong_KyLuat::class, 'MaNV', 'MaNV');
    }

    public function QuyetDinhLuong()
    {
        return $this->hasMany(QuyetDinhLuong::class, 'MaNV', 'MaNV');
    }

    public function quyetDinhTuyenDung()
    {
        return $this->hasMany(QuyetDinhTuyenDung::class, 'MaNV', 'MaNV');
    }
}
