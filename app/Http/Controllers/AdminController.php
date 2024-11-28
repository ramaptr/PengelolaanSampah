<?php
namespace App\Http\Controllers;
use App\Models\Sampah;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        {
            // Mengambil data statistik mingguan (7 hari terakhir)
            $weeklyData = Sampah::whereBetween('tanggal', [now()->subDays(6), now()])
                                ->orderBy('tanggal')
                                ->get(['tanggal', 'jumlah']);
            
            // Mengambil data statistik bulanan
            $monthlyData = Sampah::selectRaw('MONTH(tanggal) as bulan, SUM(jumlah) as total')
                                 ->groupBy('bulan')
                                 ->orderBy('bulan')
                                 ->get();
    
            // Menghitung data untuk pie chart berdasarkan kategori
            $pieData = Sampah::selectRaw('kategori, SUM(jumlah) as total')
                             ->groupBy('kategori')
                             ->get();
    
            // Mengirim data ke view
            return view('admin.dashboard', compact('weeklyData', 'monthlyData', 'pieData'));
        }}

    public function peta() {
        return view('admin.peta');
    }

    public function laporan() {
        return view('admin.laporan');
    }

    public function notifikasi() {
        return view('admin.notifikasi');
    }

    public function tempat_sampah() {
        return view('admin.tempat_sampah');
    }

    public function pengguna() {
        return view('admin.pengguna');
    }

    public function pengaturan() {
        return view('admin.pengaturan');
    }





}

