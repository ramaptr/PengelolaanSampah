<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;

class SampahController extends Controller
{
    public function index()
    {
        $sampah = Sampah::all();
        return view('admin.laporan', compact('sampah'));
    }

    public function create()
    {
        return view('admin.laporan.createLaporan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Sampah::create($request->all());

        return redirect()->route('admin.laporan')->with('success', 'Sampah created successfully.');
    }

    public function edit($id)
    {
        $sampah = Sampah::findOrFail($id);
        return view('admin.laporan.editLaporan', compact('sampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $sampah = Sampah::findOrFail($id);
        $sampah->update($request->all());

        return redirect()->route('admin.laporan')->with('success', 'Sampah updated successfully.');
    }

    public function destroy($id)
    {
        $sampah = Sampah::findOrFail($id);
        $sampah->delete();

        return redirect()->route('admin.laporan')->with('success', 'Sampah deleted successfully.');
    }
}
