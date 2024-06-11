<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'ChucVu';

    protected $fillable = [
        'MaChucVu',
        'TenChucVu',
        'HeSoLuong',
        'PhuCapChucVu',
    ];

    public function quyetDinhChucVus()
    {
        return $this->hasMany(QuyetDinhChucVu::class, 'MaChucVu', 'MaChucVu');
    }

}
