<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiHopDong extends Model
{
    use HasFactory;

    protected $table = 'LoaiHopDong';

    protected $fillable = [
        'MaLoaiHopDong',
        'TenLoaiHopDong',
        'ThoiHanHopDong',
    ];

    public function hopDongs()
    {
        return $this->hasMany(HopDong::class, 'MaLoaiHopDong', 'MaLoaiHopDong');
    }
}
