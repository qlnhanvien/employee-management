<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoBaoHiem extends Model
{
    use HasFactory;

    protected $table = 'SoBaoHiem';

    protected $fillable = [
        'MaSoBaoHiem',
        'MaNv',
        'NgayLapSoBaoHiem',
        'ThoiHanSoBaoHiem',
        'idBH',
    ];

    public function baoHiem()
    {
        return $this->belongsTo(BaoHiem::class, 'idBH', 'idBH');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNv', 'MaNV');
    }
}
