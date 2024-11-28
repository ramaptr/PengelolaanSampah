<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;


Route::get('/dashboard', function () {
    return view('welcome');
});

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/peta', [AdminController::class, 'peta'])->name('admin.peta');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('/notifikasi', [AdminController::class, 'notifikasi'])->name('admin.notifikasi');
    Route::get('/tempat_sampah', [AdminController::class, 'tempat_sampah'])->name('admin.tempat_sampah');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    Route::get('/peta', [MapController::class, 'index'])->name('admin.peta');
