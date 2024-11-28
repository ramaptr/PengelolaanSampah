<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempatSampah; // Model tempat sampah


class MapController extends Controller
{
    public function index()
    {
        // Ambil semua data tempat sampah dari database
        $tempatSampah = TempatSampah::all(); 

        // Kirim data ke view
        return view('admin.peta', compact('tempatSampah'));
    }
}