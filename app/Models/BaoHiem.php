<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoHiem extends Model
{
    use HasFactory;

    protected $table = 'BaoHiem';
    protected $primaryKey = 'idBH';
    public $incrementing = true;

    protected $fillable = [
        'MaBaoHiem',
        'TenBaoHiem',
        'TileBaoHiem',
    ];

    public function soBaohiem()
    {
        return $this->hasMany(SoBaoHiem::class, 'idBH', 'idBH');
    }
}
