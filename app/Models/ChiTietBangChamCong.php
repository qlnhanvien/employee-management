<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBangChamCong extends Model
{
    use HasFactory;

    protected $table = 'ChiTietBangChamCong';

    protected $fillable = [
        'MaNV',
        'MaBangChamCong',
        'CheckIn',
        'CheckOut',
        'Date',
        'TotalTiem',
        'Note',
    ];

    public function bangChamCong()
    {
        return $this->belongsTo(BangChamCong::class, 'MaBangChamCong', 'MaBangChamCong');
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }
}
