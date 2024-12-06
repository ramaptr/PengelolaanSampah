@extends('layouts.dashboard')

@section('content')
    <div class="page-header">
        <div class="title">Notifikasi</div>
    </div>

    <div class="card">

        <!-- Tambahkan elemen daftar notifikasi di sini -->
        <div class="flex justify-between items-center mb-6">
           <div>
            <h3>Daftar Notifikasi</h3>
        <p>Notifikasi terkait kondisi tempat sampah (penuh atau hampir penuh).</p>
           </div>
            <a href="{{ route('tempat-sampah.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg
            hover:bg-blue-700 flex items-center gap-2 transition-colors">
                Tambah Tempat Sampah
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                    Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lokasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($tempatSampah as $index => $ts)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($ts->image)
                                            <img src="{{ asset('storage/' . $ts->image) }}"
                                                class="h-12 w-12 rounded-full object-cover" alt="Tempat Sampah">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ts->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ts->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-medium
                                {{ $ts->status == 'Penuh' ? 'bg-red-100 text-red-800' : ($ts->status == 'Sedang' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                            {{ $ts->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $ts->latitude }}, {{ $ts->longitude }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a class="p-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors"
                                                href="{{ route('tempat-sampah.edit', $ts->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('tempat-sampah.destroy', $ts->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <p>Delete</p>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-inbox text-4xl text-gray-400 mb-3"></i>
                                            <p class="text-gray-500">Belum ada data tempat sampah</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
