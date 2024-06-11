<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuCap_Luong extends Model
{
    use HasFactory;

    protected $table = 'PhuCap_Luong';

    protected $fillable = [
        'SoQuyetDinhLuong',
        'MaPhuCap',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

    public function phuCap()
    {
        return $this->belongsTo(PhuCap::class, 'MaPhuCap', 'MaPhuCap');
    }

    public function quyetDinhLuong()
    {
        return $this->belongsTo(QuyetDinhLuong::class, 'SoQuyetDinhLuong', 'SoQuyetDinhLuong');
    }
}
