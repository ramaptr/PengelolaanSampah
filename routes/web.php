<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\TempatSampahController;

Route::get('/dashboard', function () {
    return view('welcome');
});

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/peta', [AdminController::class, 'peta'])->name('admin.peta');

    // -------------- LAPORAN ----------------
    Route::get('/laporan', [SampahController::class, 'index'])->name('admin.laporan');
    Route::get('/laporan/create', [SampahController::class, 'create'])->name('admin.laporan.create');
    Route::get('/laporan/{id}/edit', [SampahController::class, 'edit'])->name('admin.laporan.edit');
    Route::post('/laporan/store', [SampahController::class, 'store'])->name('sampah.create');
    Route::put('/laporan/{id}/update/', [SampahController::class, 'update'])->name('sampah.update');
    Route::delete('/laporan/delete/{id}', [SampahController::class, 'destroy'])->name('sampah.destroy');
    // -------------- LAPORAN ----------------


    // -------------- TEMPAT SAMPAH ----------------
    Route::get('/notifikasi', [TempatSampahController::class, 'index'])->name('admin.notifikasi');
    Route::get('/tempat-sampah/create', [TempatSampahController::class, 'create'])->name('tempat-sampah.create');
    Route::get('/tempat-sampah/{id}/edit', [TempatSampahController::class, 'edit'])->name('tempat-sampah.edit');
    Route::delete('/tempat-sampah/{id}', [TempatSampahController::class, 'destroyTempatSampah'])->name('tempat-sampah.destroy');
    Route::post('/tempat-sampah', [TempatSampahController::class, 'storeTempatSampah'])->name('tempat-sampah.store');
    Route::put('/tempat-sampah/{id}', [TempatSampahController::class, 'updateTempatSampah'])->name('tempat-sampah.update');
    // -------------- TEMPAT SAMPAH ----------------

    Route::get('/tempat_sampah', [AdminController::class, 'tempat_sampah'])->name('admin.tempat_sampah');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    Route::get('/peta', [MapController::class, 'index'])->name('admin.peta');
