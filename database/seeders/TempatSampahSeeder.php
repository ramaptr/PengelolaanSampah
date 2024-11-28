<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TempatSampah;


class TempatSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TempatSampah::create(['name' => 'Tempat Sampah A', 'latitude' => -6.914744, 'longitude' => 107.609810]);
        TempatSampah::create(['name' => 'Tempat Sampah B', 'latitude' => -6.915744, 'longitude' => 107.608810]);
        TempatSampah::create(['name' => 'Tempat Sampah C', 'latitude' => -6.916744, 'longitude' => 107.607810]);
        // Tambahkan lokasi lain sesuai kebutuhan
    }
}
