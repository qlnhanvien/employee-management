<?php

namespace Database\Factories;

use App\Models\NhanVien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhanVien>
 */
class NhanVienFactory extends Factory
{
    protected $model =NhanVien::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'MaNV' => $this->faker->word,
            'TenNV' => $this->faker->word,
            'Phai' =>$this->faker->word,
            'NgaySinh' => $this->faker->word,
            'DiaChiNV' => $this->faker->word,
            'DienThoaiNV' => $this->faker->word,
        ];
    }
}
