<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoHiem extends Model
{
    use HasFactory;

    protected $table = 'BaoHiem';

    protected $fillable = [
        'MaBaoHiem',
    ];

    public function soBaohiem()
    {
        return $this->hasMany(SoBaoHiem::class, 'MaBaoHiem', 'MaBaoHiem');
    }
}
