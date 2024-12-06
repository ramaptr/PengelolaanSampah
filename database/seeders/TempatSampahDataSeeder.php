<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempatSampahDataSeeder extends Seeder
{
    public function run()
    {
        $tempatSampah = [
            // Rektorat
            [
                'name' => 'Gedung Rektorat',
                'status' => 'empty',
                'latitude' => -6.9730017,
                'longitude' => 107.6291105,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gedung L',
                'status' => 'empty',
                'latitude' => -6.9725000,
                'longitude' => 107.6292000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gedung G',
                'status' => 'empty',
                'latitude' => -6.9720000,
                'longitude' => 107.6293000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Fakultas Teknik Elektro
            [
                'name' => 'Gedung N',
                'status' => 'empty',
                'latitude' => -6.9715000,
                'longitude' => 107.6294000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gedung O',
                'status' => 'empty',
                'latitude' => -6.9710000,
                'longitude' => 107.6295000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gedung P',
                'status' => 'empty',
                'latitude' => -6.9705000,
                'longitude' => 107.6296000,
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Add remaining buildings following same pattern...
        ];

        DB::table('tempat_sampah')->insert($tempatSampah);
    }
}
