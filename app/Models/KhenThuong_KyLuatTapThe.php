<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuong_KyLuatTapThe extends Model
{
    use HasFactory;

    protected $table = 'KhenThuong_KyLuatTapThe';

    protected $fillable = [
        'SoQuyetDinhKhenThuong_KyLuat',
        'MaPhongBan',
        'SoTienKhenThuong_KyLuatTapThe',
    ];

    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'MaPhongBan', 'MaPhongBan');
    }

    public function quyetDinhKhenThuongKyLuat()
    {
        return $this->belongsTo(QuyetDinhKhenThuong_KyLuat::class, 'SoQuyetDinhKhenThuong_KyLuat', 'SoQuyetDinhKhenThuong_KyLuat');
    }
}
