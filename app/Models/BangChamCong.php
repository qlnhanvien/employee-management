<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangChamCong extends Model
{
    use HasFactory;

    protected $table = 'BangChamCong';
    protected $primaryKey = 'MaBangChamCong';

    protected $fillable = [
        'MaBangChamCong',
        'TuNgay',
        'DenNgay',
    ];

    public function chiTietBangChamCong()
    {
        return $this->hasMany(ChiTietBangChamCong::class, 'MaBangChamCong', 'MaBangChamCong');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

}
