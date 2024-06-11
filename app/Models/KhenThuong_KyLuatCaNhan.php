<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuong_KyLuatCaNhan extends Model
{
    use HasFactory;

    protected $table = 'KhenThuong_KyLuatCaNhan';

    protected $fillable = [
        'SoQuyetDinhKhenThuong_KyLuat',
        'MaNV',
        'SoTienKhenThuong_KyLuatCaNhan',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

    public function quyetDinhKhenThuongKyLuat()
    {
        return $this->belongsTo(QuyetDinhKhenThuong_KyLuat::class, 'SoQuyetDinhKhenThuong_KyLuat', 'SoQuyetDinhKhenThuong_KyLuat');
    }
}
