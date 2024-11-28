@extends('layouts.dashboard')

@section('content')
<div class="page-header mb-10 flex flex-col items-center text-center">
    <div class="title text-5xl font-bold text-indigo-900 mb-3 tracking-wide">Status Tempat Sampah Kampus</div>
    <p class="text-xl text-gray-700 max-w-2xl leading-relaxed">Dukung kebersihan kampus Universitas Telkom dengan mengelola status tempat sampah di berbagai gedung untuk lingkungan yang lebih bersih.</p>
</div>

<div class="flex flex-col items-center px-4 lg:px-0 space-y-12">
    <!-- Google Map Section -->
    <div class="relative w-full max-w-6xl h-96 overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500">
        <iframe class="absolute inset-0 w-full h-full rounded-3xl transition-transform duration-500 transform hover:scale-105"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.6474404602765!2d107.6291105!3d-6.9730017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sUniversitas%20Telkom!5e0!3m2!1sen!2sid!4v1702377410615!5m2!1sen!2sid"
            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Building Group Section -->
    <div class="bg-indigo-50 w-full max-w-5xl p-8 rounded-3xl shadow-lg space-y-6">
        <h2 class="text-3xl font-semibold text-indigo-900 text-center mb-6">Daftar Gedung dan Status Tempat Sampah</h2>
        <p class="text-lg text-gray-700 text-center mb-6">Pilih gedung dan update status tempat sampah apakah penuh atau kosong untuk memastikan pengelolaan sampah berjalan dengan optimal.</p>
        
        <!-- Update Trash Status Form -->
        <form class="w-full max-w-3xl mx-auto space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="building" class="text-gray-800 font-medium mb-2">Nama Gedung</label>
                    <select id="building" name="building" class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="" disabled selected>Pilih Gedung</option>
                        
                        <!-- Rektorat -->
                        <optgroup label="Rektorat">
                            <option value="Gedung Rektorat">Gedung Rektorat - Gedung Bangkit</option>
                            <option value="Gedung L">Gedung L - Gedung Lingian</option>
                            <option value="Gedung G">Gedung G - Gedung Panehan</option>
                        </optgroup>
                        
                        <!-- Fakultas Teknik Elektro -->
                        <optgroup label="Fakultas Teknik Elektro">
                            <option value="Gedung N">Gedung N - Gedung Barung</option>
                            <option value="Gedung O">Gedung O - Gedung Ararkula</option>
                            <option value="Gedung P">Gedung P - Gedung Deli</option>
                        </optgroup>
                        
                        <!-- Fakultas Rekayasa Industri -->
                        <optgroup label="Fakultas Rekayasa Industri">
                            <option value="Gedung C">Gedung C - Gedung Karang</option>
                            <option value="Gedung Lab Proses Manufaktur">Gedung Lab Proses Manufaktur - Gedung Mangudu</option>
                        </optgroup>
                        
                        <!-- Fakultas Informatika -->
                        <optgroup label="Fakultas Informatika">
                            <option value="Gedung D">Gedung D - Gedung Panambulai</option>
                            <option value="Gedung E">Gedung E - Gedung Kultubai Utara</option>
                            <option value="Gedung F">Gedung F - Gedung Kultubai Selatan</option>
                        </optgroup>
                        
                        <!-- Fakultas Ekonomi dan Bisnis -->
                        <optgroup label="Fakultas Ekonomi dan Bisnis">
                            <option value="Gedung FEB-C">Gedung FEB-C - Gedung Miossu</option>
                            <option value="Gedung FEB-D">Gedung FEB-D - Gedung Maratua</option>
                            <option value="Gedung Kampus Gerlong">Gedung Kampus Gerlong - Gedung Marore</option>
                            <option value="Gedung R6 Gerlong">Gedung R6 Gerlong - Gedung Miangas</option>
                            <option value="Gedung R7 Gerlong">Gedung R7 Gerlong - Gedung Marampit</option>
                            <option value="Gedung R11 Gerlong">Gedung R11 Gerlong - Gedung Mangkai</option>
                            <option value="Gedung Dekanat FEB">Gedung Dekanat FEB - Gedung Manterawu</option>
                        </optgroup>
                        
                        <!-- Fakultas Komunikasi dan Bisnis -->
                        <optgroup label="Fakultas Komunikasi dan Bisnis">
                            <option value="Gedung FKB-A">Gedung FKB-A - Gedung Kawalusu</option>
                            <option value="Gedung FKB-B">Gedung FKB-B - Gedung Intata</option>
                        </optgroup>
                        
                        <!-- Fakultas Industri Kreatif -->
                        <optgroup label="Fakultas Industri Kreatif">
                            <option value="Gedung Fakultas Industri Kreatif">Gedung Fakultas Industri Kreatif - Gedung Sebatik</option>
                        </optgroup>
                        
                        <!-- Fakultas Ilmu Terapan -->
                        <optgroup label="Fakultas Ilmu Terapan">
                            <option value="Gedung Fakultas Ilmu Terapan">Gedung Fakultas Ilmu Terapan - Gedung Selaru</option>
                        </optgroup>
                        
                        <!-- Kuliah Umum -->
                        <optgroup label="Kuliah Umum">
                            <option value="KU1">KU1 - Grha Wiyata Cacuk Sudarijanto-A</option>
                            <option value="KU2">KU2 - Grha Wiyata Cacuk Sudarijanto-B</option>
                            <option value="KU3">KU3 - Gedung Tokong Nanas</option>
                        </optgroup>
                        
                        <!-- Fasilitas Umum -->
                        <optgroup label="Fasilitas Umum">
                            <option value="Masjid Syamsul Ulum">Masjid Syamsul Ulum</option>
                            <option value="Gedung Bisnis Center">Gedung Bisnis Center - Gedung Alor</option>
                            <option value="Gedung Student Center">Gedung Student Center - Gedung Karaweira</option>
                        </optgroup>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="status" class="text-gray-800 font-medium mb-2">Status Tempat Sampah</label>
                    <select id="status" name="status" class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="full">Penuh</option>
                        <option value="full">Sedang</option>
                        <option value="empty">Kosong</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold mt-4 transition-all duration-300 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update Status</button>
        </form>
    </div>

        <!-- Building Details Section -->
        <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            <!-- Card for each faculty or building group -->
            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Rektorat</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung Rektorat:</strong> Gedung Bangkit</li>
                    <li><strong>Gedung L:</strong> Gedung Lingian</li>
                    <li><strong>Gedung G (Pascasarjana):</strong> Gedung Panehan</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Teknik Elektro</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung N:</strong> Gedung Barung</li>
                    <li><strong>Gedung O:</strong> Gedung Ararkula</li>
                    <li><strong>Gedung P:</strong> Gedung Deli</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Rekayasa Industri</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung C:</strong> Gedung Karang</li>
                    <li><strong>Gedung Lab Proses Manufaktur:</strong> Gedung Mangudu</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Informatika</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung D:</strong> Gedung Panambulai</li>
                    <li><strong>Gedung E:</strong> Gedung Kultubai Utara</li>
                    <li><strong>Gedung F:</strong> Gedung Kultubai Selatan</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Ekonomi dan Bisnis</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung FEB-C:</strong> Gedung Miossu</li>
                    <li><strong>Gedung FEB-D:</strong> Gedung Maratua</li>
                    <li><strong>Gedung Kampus Gerlong:</strong> Gedung Marore</li>
                    <li><strong>Gedung R6 Gerlong:</strong> Gedung Miangas</li>
                    <li><strong>Gedung R7 Gerlong:</strong> Gedung Marampit</li>
                    <li><strong>Gedung R11 Gerlong:</strong> Gedung Mangkai</li>
                    <li><strong>Gedung Dekanat FEB:</strong> Gedung Manterawu</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Komunikasi dan Bisnis</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung FKB-A:</strong> Gedung Kawalusu</li>
                    <li><strong>Gedung FKB-B:</strong> Gedung Intata</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Industri Kreatif</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung Fakultas Industri Kreatif:</strong> Gedung Sebatik</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fakultas Ilmu Terapan</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Gedung Fakultas Ilmu Terapan:</strong> Gedung Selaru</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Kuliah Umum</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>KU1:</strong> Grha Wiyata Cacuk Sudarijanto-A</li>
                    <li><strong>KU2:</strong> Grha Wiyata Cacuk Sudarijanto-B</li>
                    <li><strong>KU3:</strong> Gedung Tokong Nanas</li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                <h3 class="text-2xl font-semibold text-indigo-800 mb-4">Fasilitas Umum</h3>
                <ul class="space-y-2 text-gray-700">
                    <li><strong>Masjid Syamsul Ulum:</strong> Masjid Syamsul Ulum</li>
                    <li><strong>Gedung Bisnis Center:</strong> Gedung Alor</li>
                    <li><strong>Gedung Student Center:</strong> Gedung Karaweira</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
