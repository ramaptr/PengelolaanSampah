<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // Organik, Anorganik, dll.
            $table->integer('jumlah');  // Jumlah sampah dalam kilogram
            $table->date('tanggal');    // Tanggal pencatatan sampah
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampah');
    }
};
