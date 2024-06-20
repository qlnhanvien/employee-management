<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyetDinhTuyenDung extends Model
{
    use HasFactory;

    protected $table = 'QuyetDinhTuyenDung';
    protected $primaryKey = 'SoQuyetDinhTuyenDung';
    public $incrementing = true;

    protected $fillable = [
        'NgayQuyetDinhTuyenDung',
        'ThoiGianThuViec',
        'MucLuongThuViec',
        'NoiDungQuyetDinhTuyenDung',
        'MaNV',
        'MaPhongBan',
    ];

    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'MaPhongBan', 'MaPhongBan');
    }

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

}
