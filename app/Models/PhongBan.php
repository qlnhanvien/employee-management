<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    protected $table = 'PhongBan';

    protected $fillable = [
        'MaPhongBan',
        'TenPhongBan',
        'DienThoaiPhongBan',
    ];

    public function khenThuongKyLuatTapThes()
    {
        return $this->hasMany(KhenThuong_KyLuatTapThe::class, 'MaPhongBan', 'MaPhongBan');
    }

    public function nhanViens()
    {
        return $this->hasMany(NhanVien::class, 'MaPhongBan', 'MaPhongBan');
    }

    public function quyetDinhTuyenDungs()
    {
        return $this->hasMany(QuyetDinhTuyenDung::class, 'MaPhongBan', 'MaPhongBan');
    }

}
