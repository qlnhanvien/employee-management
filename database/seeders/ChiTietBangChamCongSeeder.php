<?php

namespace Database\Seeders;

use App\Models\ChiTietBangChamCong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietBangChamCongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietBangChamCong::query()->delete();

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '002',
            'MaNV' => '002',
            'CheckIn' => '09:00:00',
            'CheckOut' => '18:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'Late by 1 hour',
        ]);
        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '002',
            'MaNV' => '002',
            'CheckIn' => '09:00:00',
            'CheckOut' => '18:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'Late by 1 hour',
        ]);
        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '002',
            'MaNV' => '002',
            'CheckIn' => '09:00:00',
            'CheckOut' => '18:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'Late by 1 hour',
        ]);
        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '002',
            'MaNV' => '002',
            'CheckIn' => '09:00:00',
            'CheckOut' => '18:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'Late by 1 hour',
        ]);
        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);

        ChiTietBangChamCong::create([
            'MaBangChamCong' => '002',
            'MaNV' => '002',
            'CheckIn' => '09:00:00',
            'CheckOut' => '18:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'Late by 1 hour',
        ]);
        ChiTietBangChamCong::create([
            'MaBangChamCong' => '001',
            'MaNV' => '001',
            'CheckIn' => '08:00:00',
            'CheckOut' => '17:00:00',
            'Date' => '2024-06-12',
            'TotalTime' => '08:00:00',
            'Note' => 'On time',
        ]);
    }
}
