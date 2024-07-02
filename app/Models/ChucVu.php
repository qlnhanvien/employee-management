<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'ChucVu';
    protected $primaryKey = 'MaChucVu';
    public $incrementing = true;

    protected $fillable = [
        'TenChucVu',
        'HeSoLuong',
        'PhuCapChucVu',
    ];

    public function quyetDinhChucVus()
    {
        return $this->hasMany(QuyetDinhChucVu::class, 'MaChucVu', 'MaChucVu');
    }
}
