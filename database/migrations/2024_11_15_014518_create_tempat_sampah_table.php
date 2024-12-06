<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tempat_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('image')->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->date('date');
            $table->timestamps();
        });

        // Insert initial data
        $statuses = ['Penuh', 'Sedang', 'Kosong'];
        $date = date('Y-m-d');

        foreach ([
            ['name' => 'Gedung Rektorat', 'latitude' => -6.9730017, 'longitude' => 107.6291105],
            ['name' => 'Gedung L', 'latitude' => -6.9725000, 'longitude' => 107.6292000],
            ['name' => 'Gedung G', 'latitude' => -6.9720000, 'longitude' => 107.6293000],
            ['name' => 'Gedung N', 'latitude' => -6.9715000, 'longitude' => 107.6294000],
            ['name' => 'Gedung O', 'latitude' => -6.9710000, 'longitude' => 107.6295000],
            ['name' => 'Gedung P', 'latitude' => -6.9705000, 'longitude' => 107.6296000],
            ['name' => 'Gedung C', 'latitude' => -6.9700000, 'longitude' => 107.6297000],
            ['name' => 'Gedung Lab Proses Manufaktur', 'latitude' => -6.9695000, 'longitude' => 107.6298000],
            ['name' => 'Gedung D', 'latitude' => -6.9690000, 'longitude' => 107.6299000],
            ['name' => 'Gedung E', 'latitude' => -6.9685000, 'longitude' => 107.6300000],
            ['name' => 'Gedung F', 'latitude' => -6.9680000, 'longitude' => 107.6301000],
            ['name' => 'Gedung FEB-C', 'latitude' => -6.9675000, 'longitude' => 107.6302000],
            ['name' => 'Gedung FEB-D', 'latitude' => -6.9670000, 'longitude' => 107.6303000],
            ['name' => 'Gedung Kampus Gerlong', 'latitude' => -6.9665000, 'longitude' => 107.6304000],
            ['name' => 'Gedung R6 Gerlong', 'latitude' => -6.9660000, 'longitude' => 107.6305000],
            ['name' => 'Gedung R7 Gerlong', 'latitude' => -6.9655000, 'longitude' => 107.6306000],
            ['name' => 'Gedung R11 Gerlong', 'latitude' => -6.9650000, 'longitude' => 107.6307000],
            ['name' => 'Gedung Dekanat FEB', 'latitude' => -6.9645000, 'longitude' => 107.6308000],
            ['name' => 'Gedung FKB-A', 'latitude' => -6.9640000, 'longitude' => 107.6309000],
            ['name' => 'Gedung FKB-B', 'latitude' => -6.9635000, 'longitude' => 107.6310000],
            ['name' => 'Gedung Fakultas Industri Kreatif', 'latitude' => -6.9630000, 'longitude' => 107.6311000],
            ['name' => 'Gedung Fakultas Ilmu Terapan', 'latitude' => -6.9625000, 'longitude' => 107.6312000],
            ['name' => 'KU1', 'latitude' => -6.9620000, 'longitude' => 107.6313000],
            ['name' => 'KU2', 'latitude' => -6.9615000, 'longitude' => 107.6314000],
            ['name' => 'KU3', 'latitude' => -6.9610000, 'longitude' => 107.6315000],
            ['name' => 'Masjid Syamsul Ulum', 'latitude' => -6.9605000, 'longitude' => 107.6316000],
            ['name' => 'Gedung Bisnis Center', 'latitude' => -6.9600000, 'longitude' => 107.6317000],
            ['name' => 'Gedung Student Center', 'latitude' => -6.9595000, 'longitude' => 107.6318000],
        ] as $data) {
            DB::table('tempat_sampah')->insert([
                'name' => $data['name'],
                'status' => $statuses[array_rand($statuses)],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'date' => $date,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_sampah');
    }
};
