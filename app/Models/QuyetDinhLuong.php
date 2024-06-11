<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyetDinhLuong extends Model
{
    use HasFactory;

    protected $table = 'QuyetDinhLuong';

    protected $fillable = [
        'SoQuyetDinhLuong',
        'MaNV',
        'MucLuongCoBan',
        'NgayQuyetDinhLuong',
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

    public function phuCapLuongs()
    {
        return $this->hasMany(PhuCap_Luong::class, 'SoQuyetDinhLuong', 'SoQuyetDinhLuong');
    }


}
