<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;

    protected $table = 'HopDong';

    protected $fillable = [
        'SoHopDong',
        'MaLoaiHopDong',
        'MaNV',
        'NgayLapHopDong',
        'NoiDungHopDong',
    ];

    public function loaiHopDong()
    {
        return $this->belongsTo(LoaiHopDong::class, 'MaLoaiHopDong', 'MaLoaiHopDong');
    }
}
