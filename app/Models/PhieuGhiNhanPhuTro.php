<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuGhiNhanPhuTro extends Model
{
    use HasFactory;

    protected $table = 'PhieuGhiNhanPhuTro';

    protected $fillable = [
        'SoPhieuGhiNhanPhuTro',
        'NgayPhuTro',
        'HinhThucPhuTro',
        'HeSoPhuTro',
    ];

    public function ChiTietPhuTros()
    {
        return $this->hasMany(ChiTietPhuTro::class, 'SoPhieuGhiNhanPhuTro', 'SoPhieuGhiNhanPhuTro');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }
}
