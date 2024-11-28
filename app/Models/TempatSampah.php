<?php

// app/Models/TempatSampah.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatSampah extends Model
{
    use HasFactory;

    // Jika tabel Anda menggunakan nama yang berbeda dari pluralisasi model,
    // tambahkan properti berikut:
    protected $table = 'tempat_sampah'; // Nama tabel di database

    protected $fillable = [
        'name', 'latitude', 'longitude',
    ];
}
