@extends('layouts.dashboard')

@section('content')
    <div class="page-header mb-10 flex flex-col items-center text-center">
        <div class="title text-5xl font-bold text-indigo-900 mb-3 tracking-wide">Status Tempat Sampah Kampus</div>
        <p class="text-xl text-gray-700 max-w-2xl leading-relaxed">Dukung kebersihan kampus Universitas Telkom dengan
            mengelola status tempat sampah di berbagai gedung untuk lingkungan yang lebih bersih.</p>
    </div>

    <div class="flex flex-col items-center px-4 lg:px-0 space-y-12">
        <!-- Google Map Section -->
        <div
            class="relative w-full max-w-6xl h-96 overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500">
            <iframe
                class="absolute inset-0 w-full h-full rounded-3xl transition-transform duration-500 transform hover:scale-105"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.6474404602765!2d107.6291105!3d-6.9730017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sUniversitas%20Telkom!5e0!3m2!1sen!2sid!4v1702377410615!5m2!1sen!2sid"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Video Section -->
        <div class="flex flex-col lg:flex-row gap-4 w-full max-w-6xl">
            <div class="relative w-full lg:w-1/2 h-96">
                <h1 class="text-center font-bold mb-2">CCTV 1 - TULT</h1>
                <div
                    class="relative w-full h-full overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl border-4 border-blue-300 transition-all duration-500">
                    <video
                        class="absolute inset-0 w-full h-full rounded-3xl transition-transform duration-500 transform hover:scale-105"
                        autoplay loop muted>
                        <source src="{{ asset('videos/cctv 3.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="relative w-full lg:w-1/2 h-96">
                <h1 class="text-center font-bold mb-2">CCTV 2 - TULT</h1>
                <div
                    class="relative w-full h-full overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl border-4 border-blue-300 transition-all duration-500">
                    <video
                        class="absolute inset-0 w-full h-full rounded-3xl transition-transform duration-500 transform hover:scale-105"
                        autoplay loop muted>
                        <source src="{{ asset('videos/cctv 1.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <!-- Building Group Section -->
        <div class="bg-indigo-50 w-full max-w-5xl p-8 rounded-3xl shadow-lg space-y-6">
            <h2 class="text-3xl font-semibold text-indigo-900 text-center mb-6">Daftar Gedung dan Status Tempat Sampah</h2>
            <p class="text-lg text-gray-700 text-center mb-6">Pilih gedung dan update status tempat sampah apakah penuh atau
                kosong untuk memastikan pengelolaan sampah berjalan dengan optimal.</p>

            <!-- Update Trash Status Form -->
            <form class="w-full max-w-3xl mx-auto space-y-4" method="POST" action="{{ route('tempat-sampah.store') }}"
                enctype="multipart/form-data" id="updateForm">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label for="building" class="text-gray-800 font-medium mb-2">Nama Gedung</label>
                        <select id="building" name="name" required
                            class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="" disabled selected>Pilih Gedung</option>

                            <!-- Rektorat -->
                            <optgroup label="Rektorat">
                                <option value="Gedung Rektorat" data-lat="-6.972593" data-long="107.632454">Gedung Rektorat
                                    - Gedung Bangkit</option>
                                <option value="Gedung L" data-lat="-6.973127" data-long="107.632325">Gedung L - Gedung
                                    Lingian</option>
                                <option value="Gedung G" data-lat="-6.973456" data-long="107.632567">Gedung G - Gedung
                                    Panehan</option>
                            </optgroup>

                            <!-- Fakultas Teknik Elektro -->
                            <optgroup label="Fakultas Teknik Elektro">
                                <option value="Gedung N" data-lat="-6.973876" data-long="107.632789">Gedung N - Gedung
                                    Barung</option>
                                <option value="Gedung O" data-lat="-6.974123" data-long="107.632901">Gedung O - Gedung
                                    Ararkula</option>
                                <option value="Gedung P" data-lat="-6.974345" data-long="107.633012">Gedung P - Gedung Deli
                                </option>
                            </optgroup>

                            <!-- Fakultas Rekayasa Industri -->
                            <optgroup label="Fakultas Rekayasa Industri">
                                <option value="Gedung C" data-lat="-6.974567" data-long="107.633234">Gedung C - Gedung
                                    Karang</option>
                                <option value="Gedung Lab Proses Manufaktur" data-lat="-6.974789" data-long="107.633456">
                                    Gedung Lab Proses Manufaktur - Gedung Mangudu</option>
                            </optgroup>

                            <!-- Fakultas Informatika -->
                            <optgroup label="Fakultas Informatika">
                                <option value="Gedung D" data-lat="-6.975012" data-long="107.633678">Gedung D - Gedung
                                    Panambulai</option>
                                <option value="Gedung E" data-lat="-6.975234" data-long="107.633890">Gedung E - Gedung
                                    Kultubai Utara</option>
                                <option value="Gedung F" data-lat="-6.975456" data-long="107.634012">Gedung F - Gedung
                                    Kultubai Selatan</option>
                            </optgroup>

                            <!-- Fakultas Ekonomi dan Bisnis -->
                            <optgroup label="Fakultas Ekonomi dan Bisnis">
                                <option value="Gedung FEB-C" data-lat="-6.975678" data-long="107.634234">Gedung FEB-C -
                                    Gedung Miossu</option>
                                <option value="Gedung FEB-D" data-lat="-6.975890" data-long="107.634456">Gedung FEB-D -
                                    Gedung Maratua</option>
                                <option value="Gedung Kampus Gerlong" data-lat="-6.976012" data-long="107.634678">Gedung
                                    Kampus Gerlong - Gedung Marore</option>
                                <option value="Gedung R6 Gerlong" data-lat="-6.976234" data-long="107.634890">Gedung R6
                                    Gerlong - Gedung Miangas</option>
                                <option value="Gedung R7 Gerlong" data-lat="-6.976456" data-long="107.635012">Gedung R7
                                    Gerlong - Gedung Marampit</option>
                                <option value="Gedung R11 Gerlong" data-lat="-6.976678" data-long="107.635234">Gedung R11
                                    Gerlong - Gedung Mangkai</option>
                                <option value="Gedung Dekanat FEB" data-lat="-6.976890" data-long="107.635456">Gedung
                                    Dekanat FEB - Gedung Manterawu</option>
                            </optgroup>

                            <!-- Fakultas Komunikasi dan Bisnis -->
                            <optgroup label="Fakultas Komunikasi dan Bisnis">
                                <option value="Gedung FKB-A" data-lat="-6.977012" data-long="107.635678">Gedung FKB-A -
                                    Gedung Kawalusu</option>
                                <option value="Gedung FKB-B" data-lat="-6.977234" data-long="107.635890">Gedung FKB-B -
                                    Gedung Intata</option>
                            </optgroup>

                            <!-- Fakultas Industri Kreatif -->
                            <optgroup label="Fakultas Industri Kreatif">
                                <option value="Gedung Fakultas Industri Kreatif" data-lat="-6.977456"
                                    data-long="107.636012">Gedung Fakultas Industri Kreatif - Gedung Sebatik</option>
                            </optgroup>

                            <!-- Fakultas Ilmu Terapan -->
                            <optgroup label="Fakultas Ilmu Terapan">
                                <option value="Gedung Fakultas Ilmu Terapan" data-lat="-6.977678" data-long="107.636234">
                                    Gedung Fakultas Ilmu Terapan - Gedung Selaru</option>
                            </optgroup>

                            <!-- Kuliah Umum -->
                            <optgroup label="Kuliah Umum">
                                <option value="KU1" data-lat="-6.977890" data-long="107.636456">KU1 - Grha Wiyata
                                    Cacuk Sudarijanto-A</option>
                                <option value="KU2" data-lat="-6.978012" data-long="107.636678">KU2 - Grha Wiyata
                                    Cacuk Sudarijanto-B</option>
                                <option value="KU3" data-lat="-6.978234" data-long="107.636890">KU3 - Gedung Tokong
                                    Nanas</option>
                            </optgroup>

                            <!-- Fasilitas Umum -->
                            <optgroup label="Fasilitas Umum">
                                <option value="Masjid Syamsul Ulum" data-lat="-6.978456" data-long="107.637012">Masjid
                                    Syamsul Ulum</option>
                                <option value="Gedung Bisnis Center" data-lat="-6.978678" data-long="107.637234">Gedung
                                    Bisnis Center - Gedung Alor</option>
                                <option value="Gedung Student Center" data-lat="-6.978890" data-long="107.637456">Gedung
                                    Student Center - Gedung Karaweira</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="status" class="text-gray-800 font-medium mb-2">Status Tempat Sampah</label>
                        <select id="status" name="status" required
                            class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Penuh">Penuh</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="image" class="text-gray-800 font-medium mb-2">Upload Gambar Bukti Sampah</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex flex-col">
                    <label for="image" class="text-gray-800 font-medium mb-2">Tanggal</label>
                    <input type="date" id="date" name="date"
                        class="bg-white p-3 rounded-lg shadow-inner border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold mt-4 transition-all duration-300 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update
                    Status</button>
            </form>
        </div>

        <!-- Building Details Section -->
        <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @foreach ($tempatSampah as $ts)
                <div
                    class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                    <h3 class="text-2xl font-semibold text-indigo-800 mb-4">{{ $ts->name }}</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li><strong>Status:</strong> {{ $ts->status }}</li>
                        <li><strong>Lokasi:</strong> {{ $ts->latitude }}, {{ $ts->longitude }}</li>
                        @if ($ts->image)
                            <li><img src="{{ asset('storage/' . $ts->image) }}" class="h-32 w-32 object-cover rounded-lg"
                                    alt="Tempat Sampah"></li>
                        @endif
                    </ul>
                    {{-- <button
                        onclick="editTrashBin('{{ $ts->id }}', '{{ $ts->name }}', '{{ $ts->status }}', '{{ $ts->latitude }}', '{{ $ts->longitude }}')"
                        class="mt-4 w-full bg-yellow-500 text-white py-2 rounded-lg font-semibold transition-all duration-300 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        Edit
                    </button> --}}
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('building').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('latitude').value = selectedOption.dataset.lat;
            document.getElementById('longitude').value = selectedOption.dataset.long;
        });

        function editTrashBin(id, name, status, latitude, longitude) {
            document.getElementById('building').value = name;
            document.getElementById('status').value = status;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            document.getElementById('updateForm').action = "{{ route('tempat-sampah.update', '') }}/" + id;
        }
    </script>
@endsection
