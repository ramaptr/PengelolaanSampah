<?php
namespace App\Http\Controllers;
use App\Models\Sampah;
use App\Models\TempatSampah;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{

public function dashboard(Request $request) {
    // Mendapatkan bulan yang dipilih dari request, default ke bulan ini
    $selectedMonth = $request->input('month', now()->format('Y-m'));

    // // Dummy data for daily chart (7 days)
    // $dailyData = collect([
    //     ['tanggal' => '2023-12-01', 'jumlah' => 50],
    //     ['tanggal' => '2023-12-02', 'jumlah' => 65],
    //     ['tanggal' => '2023-12-03', 'jumlah' => 45],
    //     ['tanggal' => '2023-12-04', 'jumlah' => 70],
    //     ['tanggal' => '2023-12-05', 'jumlah' => 55],
    //     ['tanggal' => '2023-12-06', 'jumlah' => 80],
    //     ['tanggal' => '2023-12-07', 'jumlah' => 60],
    //     ['tanggal' => '2023-12-09', 'jumlah' => 60],
    //     ['tanggal' => '2023-12-09', 'jumlah' => 60],
    //     ['tanggal' => '2023-12-10', 'jumlah' => 60],
    //     ['tanggal' => '2023-12-11', 'jumlah' => 60],
    // ]);

    // // Dummy data for weekly chart (4 weeks)
    // $weeklyData = collect([
    //     ['minggu' => 1, 'total' => 250],
    //     ['minggu' => 2, 'total' => 320],
    //     ['minggu' => 3, 'total' => 280],
    //     ['minggu' => 4, 'total' => 350],
    // ]);

    // // Dummy data for pie chart (categories)
    // $pieData = collect([
    //     ['kategori' => 'Organik', 'total' => 450],
    //     ['kategori' => 'Anorganik', 'total' => 300],
    //     ['kategori' => 'Daur Ulang', 'total' => 250],
    //     ['kategori' => 'Tidak Bisa Daur Ulang', 'total' => 200],
    // ]);

    // Mengambil data harian dari database berdasarkan bulan yang dipilih
        $dailyData = Sampah::selectRaw('DATE(tanggal) as tanggal, SUM(jumlah) as jumlah')
        ->where('tanggal', 'like', $selectedMonth . '%')
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

        // Mengambil data mingguan dari database berdasarkan bulan yang dipilih
        $weeklyData = Sampah::selectRaw('
    FLOOR((DAY(tanggal) - 1) / 7) + 1 as minggu,
    MIN(tanggal) as start_date,
    MAX(tanggal) as end_date,
    SUM(jumlah) as total
')
->where('tanggal', 'like', $selectedMonth . '%')
->groupBy('minggu')
->orderBy('minggu')
->get();

        // dd($weeklyData);

        // Mengambil data kategori dari database berdasarkan bulan yang dipilih
        $pieData = Sampah::selectRaw('kategori, SUM(jumlah) as total')
        ->where('tanggal', 'like', $selectedMonth . '%')
        ->groupBy('kategori')
        ->orderBy('kategori')
        ->get();

    return view('admin.dashboard', compact('dailyData', 'weeklyData', 'pieData', 'selectedMonth'));
}


    public function peta() {
        return view('admin.peta');
    }

    public function notifikasi() {
        $tempatSampah = TempatSampah::orderBy('date', 'desc')->get();
        return view('admin.notifikasi', compact('tempatSampah'));
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

