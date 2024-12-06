<?php

namespace App\Http\Controllers;

use App\Models\TempatSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TempatSampahController extends Controller
{
    // Mendapatkan semua tempat sampah
    public function index()
{
    $tempatSampah = TempatSampah::orderBy('date', 'desc')->get();
    return view('admin.notifikasi', compact('tempatSampah'));
}

    // Membuat/Update tempat sampah dengan upload image
    public function storeTempatSampah(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tempat-sampah', 'public');
            $validated['image'] = $path;
        }

        TempatSampah::create($validated);

        return redirect()->route('admin.notifikasi')->with('success', 'Data tempat sampah berhasil ditambahkan');
    }

    public function updateTempatSampah(Request $request, $id)
{
    // dd($request->all()); // Debug statement

    $tempatSampah = TempatSampah::findOrFail($id);

    try {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date|string'
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        die(print_r($e->errors(), true));
    }

    if ($request->hasFile('image')) {
        if($tempatSampah->image) {
            Storage::delete('public/' . $tempatSampah->image);
        }
        $path = $request->file('image')->store('tempat-sampah', 'public');
        $validated['image'] = $path;
    }

    $tempatSampah->update($validated);

    return redirect()->route('admin.notifikasi')->with('success', 'Data tempat sampah berhasil diperbarui');
}

public function edit($id){
    $tempatSampah = TempatSampah::findOrFail($id);
    return view('admin.notifikasi.editNotifikasi', compact('tempatSampah'));
}

    // Membuat tempat sampah
    public function create()
    {
        return view('admin.notifikasi.createNotifikasi');
}

    // Hapus tempat sampah
    public function destroyTempatSampah($id)
    {
        $tempatSampah = TempatSampah::findOrFail($id);

        // Delete image if exists
        if($tempatSampah->image) {
            Storage::delete('public/' . $tempatSampah->image);
        }

        $tempatSampah->delete();

        return redirect()->back()->with('success', 'Data tempat sampah berhasil dihapus');
    }
}
