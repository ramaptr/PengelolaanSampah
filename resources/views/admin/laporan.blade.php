@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Laporan Pengelolaan Sampah</h1>
        <a href="{{ route('admin.laporan.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg
            hover:bg-blue-700 flex items-center gap-2 transition-colors">
            Tambah Sampah
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- @php
                        dd($sampah)
                        @endphp --}}
                        @forelse($sampah as $index => $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->jumlah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->tanggal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a class="p-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition-colors"
                                            href="{{ route('admin.laporan.edit', $item->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('sampah.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-inbox text-4xl text-gray-400 mb-3"></i>
                                        <p class="text-gray-500">Belum ada data sampah</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
