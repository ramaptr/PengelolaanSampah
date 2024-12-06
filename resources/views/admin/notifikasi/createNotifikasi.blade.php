<!-- resources/views/admin/tempat-sampah/create.blade.php -->
@extends('layouts.dashboard')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Tambah Tempat Sampah</h2>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <form method="POST" action="{{ route('tempat-sampah.store') }}" enctype="multipart/form-data"
                    id="updateForm"class="p-6">
                    @csrf
                    @method('POST')
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pilih Gedung</label>
                            <select name="name" id="buildingSelector" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Gedung</option>
                                <optgroup label="Rektorat">
                                    <option value="Gedung Rektorat" data-lat="-6.972593" data-long="107.632454">Gedung
                                        Rektorat - Gedung Bangkit</option>
                                    <option value="Gedung L" data-lat="-6.973127" data-long="107.632325">Gedung L - Gedung
                                        Lingian</option>
                                    <option value="Gedung G" data-lat="-6.973456" data-long="107.632567">Gedung G - Gedung
                                        Panehan</option>
                                </optgroup>
                                <optgroup label="Fakultas Teknik Elektro">
                                    <option value="Gedung N" data-lat="-6.973876" data-long="107.632789">Gedung N - Gedung
                                        Barung</option>
                                    <option value="Gedung O" data-lat="-6.974123" data-long="107.632901">Gedung O - Gedung
                                        Ararkula</option>
                                    <option value="Gedung P" data-lat="-6.974345" data-long="107.633012">Gedung P - Gedung
                                        Deli</option>
                                </optgroup>
                                <optgroup label="Fakultas Teknik Informatika">
                                    <option value="Gedung Q" data-lat="-6.974567" data-long="107.633234">Gedung Q - Gedung
                                        Informatika</option>
                                    <option value="Gedung R" data-lat="-6.974789" data-long="107.633456">Gedung R - Gedung
                                        Komputer</option>
                                    <option value="Gedung S" data-lat="-6.975012" data-long="107.633678">Gedung S - Gedung
                                        Sistem Informasi</option>
                                </optgroup>
                                <optgroup label="Fakultas Ekonomi dan Bisnis">
                                    <option value="Gedung T" data-lat="-6.975234" data-long="107.633890">Gedung T - Gedung
                                        Ekonomi</option>
                                    <option value="Gedung U" data-lat="-6.975456" data-long="107.634012">Gedung U - Gedung
                                        Bisnis</option>
                                    <option value="Gedung V" data-lat="-6.975678" data-long="107.634234">Gedung V - Gedung
                                        Manajemen</option>
                                </optgroup>
                                <!-- Add more building options as needed -->
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Penuh">Penuh</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Kosong">Kosong</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="date" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="image" accept="image/*" required
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </div>

                    <div class="mt-6 flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.notifikasi') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('buildingSelector').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('latitude').value = selectedOption.dataset.lat;
            document.getElementById('longitude').value = selectedOption.dataset.long;
        });
    </script>
@endsection
