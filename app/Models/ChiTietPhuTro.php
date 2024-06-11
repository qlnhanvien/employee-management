<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhuTro extends Model
{
    use HasFactory;

    protected $table = 'ChiTietPhuTro';

    protected $fillable = [
        'MaNv',
        'SoPhieuGhiNhanPhuTro',
        'SoGioPhuTro',
    ];

    public function phieuGhiNhanPhuTro()
    {
        return $this->belongsTo(PhieuGhiNhanPhuTro::class, 'SoPhieuGhiNhanPhuTro', 'SoPhieuGhiNhanPhuTro');
    }

    // ChiTietPhieuPhuTroi thuộc về một NhanVien
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

    public function phuCap()
    {
        return $this->belongsTo(PhuCap::class, 'MaPhuCap', 'MaPhuCap');
    }
}
