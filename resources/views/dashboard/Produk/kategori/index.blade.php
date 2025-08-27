@extends('layouts.app')

@section('content')
<div class="mx-auto" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <!-- Judul -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Kategori Produk
    </h1>

    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div x-data="{ loadingTable: true }" x-init="setTimeout(() => loadingTable = false, 2000)">

            <!-- Header Action -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <!-- Tombol Tambah -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-32 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        @include('dashboard.Produk.kategori.modal.create')
                    </template>
                </div>

                <!-- Search Box -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        <input type="text" placeholder="Cari kategori..."
                            class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-gray-300">
                    </template>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-center">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-sm font-medium">Kategori</th>
                            <th class="px-6 py-3 text-sm font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center text-sm">
                        @if($categories->isEmpty())
                        <tr>
                            <td colspan="3" class="py-6 text-gray-500">Tidak ada data</td>
                        </tr>
                        @else
                        @foreach ($categories as $kategori)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $kategori->name }}</td>
                            <td class="px-6 py-4 text-center flex justify-center space-x-2">
                                <!-- Edit Button (menggunakan icon) -->
                                @include('dashboard.Produk.kategori.modal.edit', ['kategori' => $kategori])

                                <!-- Delete Button (menggunakan icon) -->
                                <form action="{{ route('dashboard.produk.kategori.destroy', $kategori->id) }}"
                                    method="POST" onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm mx-1 flex items-center space-x-1">
                                        <!-- Icon tong sampah -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection