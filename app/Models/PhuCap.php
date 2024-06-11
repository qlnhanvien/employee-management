<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuCap extends Model
{
    use HasFactory;

    protected $table = 'PhuCap';

    protected $fillable = [
        'MaPhuCap',
        'TenPhuCap',
        'SoTienPhuCap',
    ];

    public function chiTietPhuTros()
    {
        return $this->hasMany(ChiTietPhuTro::class, 'MaPhuCap', 'MaPhuCap');
    }

    public function phuCapLuongs()
    {
        return $this->hasMany(PhuCap_Luong::class, 'MaPhuCap', 'MaPhuCap');
    }

}
