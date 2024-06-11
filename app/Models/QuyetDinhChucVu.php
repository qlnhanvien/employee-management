<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyetDinhChucVu extends Model
{
    use HasFactory;

    protected $table = 'QuyetDinhChucVu';

    protected $fillable = [
        'SoQuyetDinhChucVu',
        'MaNV',
        'NgayQuyetDinhChucVu',
    ];

    public function chiTietQuyetDinhChucVu()
    {
        return $this->hasMany(ChiTietQuyetDinhChucVu::class, 'SoQuyetDinhChucVu', 'SoQuyetDinhChucVu');
    }

    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'MaChucVu', 'MaChucVu');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }
}
