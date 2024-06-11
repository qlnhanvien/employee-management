<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyetDinhKhenThuong_KyLuat extends Model
{
    use HasFactory;

    protected $table = 'QuyetDinhKhenThuong_KyLuat';

    protected $fillable = [
        'SoQuyetDinhKhenThuong_KyLuat',
        'NgayQuyetDinhKhenThuong_KyLuat',
        'NoiDungQuyetDinhKhenThuong_KyLuat',
    ];

    public function khenThuongKyLuatCaNhans()
    {
        return $this->hasMany(KhenThuong_KyLuatCaNhan::class, 'SoQuyetDinhKhenThuong_KyLuat', 'SoQuyetDinhKhenThuong_KyLuat');
    }

    public function khenThuongKyLuatTapThes()
    {
        return $this->hasMany(KhenThuong_KyLuatTapThe::class, 'SoQuyetDinhKhenThuong_KyLuat', 'SoQuyetDinhKhenThuong_KyLuat');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }
}
