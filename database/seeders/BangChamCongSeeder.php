<?php

namespace Database\Seeders;

use App\Models\BangChamCong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BangChamCongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BangChamCong::query()->delete();

        BangChamCong::create([
            'MaBangChamCong' => '001',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);

        BangChamCong::create([
            'MaBangChamCong' => '002',
            'TuNgay' => '2024-07-01',
            'DenNgay' => '2024-07-31',
        ]);
        BangChamCong::create([
            'MaBangChamCong' => '003',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);

        BangChamCong::create([
            'MaBangChamCong' => '004',
            'TuNgay' => '2024-07-01',
            'DenNgay' => '2024-07-31',
        ]);
        BangChamCong::create([
            'MaBangChamCong' => '005',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);

        BangChamCong::create([
            'MaBangChamCong' => '006',
            'TuNgay' => '2024-07-01',
            'DenNgay' => '2024-07-31',
        ]);
        BangChamCong::create([
            'MaBangChamCong' => '007',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);

        BangChamCong::create([
            'MaBangChamCong' => '008',
            'TuNgay' => '2024-07-01',
            'DenNgay' => '2024-07-31',
        ]);
        BangChamCong::create([
            'MaBangChamCong' => '009',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);

        BangChamCong::create([
            'MaBangChamCong' => '010',
            'TuNgay' => '2024-07-01',
            'DenNgay' => '2024-07-31',
        ]);
        BangChamCong::create([
            'MaBangChamCong' => '011',
            'TuNgay' => '2024-06-01',
            'DenNgay' => '2024-06-30',
        ]);
    }
}
