<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatSampah extends Model
{
    protected $table = 'tempat_sampah';

    protected $fillable = [
        'name',
        'status',
        'image',
        'latitude',
        'longitude',
        'date'
    ];
}
