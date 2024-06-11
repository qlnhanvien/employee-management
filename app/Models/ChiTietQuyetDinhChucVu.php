<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietQuyetDinhChucVu extends Model
{
    use HasFactory;

    protected $table = 'ChiTietQuyetDinhChucVu';

    protected $fillable = [
        'SoQuyetDinhChucVu',
        'MaChucVu',
    ];

    public function quyetDinhChucVu()
    {
        return $this->belongsTo(QuyetDinhChucVu::class, 'SoQuyetDinhChucVu', 'SoQuyetDinhChucVu');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }
    
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'MaChucVu', 'MaChucVu');
    }

}
