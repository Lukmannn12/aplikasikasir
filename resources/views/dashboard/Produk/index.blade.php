@extends('layouts.app')

@section('content')
<div class="mx-auto" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <!-- Judul (tidak ada skeleton) -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Produk
    </h1>


    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div x-data="{ loadingTable: true }" x-init="setTimeout(() => loadingTable = false, 2000)">
            <!-- Header Action -->
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center px-6 py-4 border-b border-gray-200 space-y-3 md:space-y-0">

                <!-- Tombol + Modal -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-32 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        @include('dashboard.Produk.modal.create')
                    </template>
                </div>

                <!-- Search & Filter -->
                <div class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-3">

                    <!-- Search Box -->
                    <div>
                        <template x-if="loadingTable">
                            <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                        </template>
                        <template x-if="!loadingTable">
                            <div>
                                <form method="GET" action="{{ route('dashboard.produk.index') }}">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari produk..."
                                        class="border border-gray-200 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-gray-300">
                                </form>
                            </div>
                        </template>
                    </div>

                    <!-- Filter Kategori -->
                    <div class="flex flex-wrap gap-2 text-sm">
                        <a href="{{ route('dashboard.produk.index') }}" class="px-3 py-1 rounded-lg border 
              {{ request('category_id') == null ? 'bg-green-600 text-white' : 'bg-white text-gray-700' }}
              hover:bg-green-500 hover:text-white transition-colors duration-200">
                            Semua
                        </a>
                        @foreach($categories as $category)
                        <a href="{{ route('dashboard.produk.index', ['category_id' => $category->id]) }}" class="px-3 py-1 rounded-lg border 
                  {{ request('category_id') == $category->id ? 'bg-green-600 text-white' : 'bg-white text-gray-700' }}
                  hover:bg-green-500 hover:text-white transition-colors duration-200">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-center">
                    <tr class="text-center">
                        <th class="px-6 py-3 text-sm font-medium">No</th>
                        <th class="px-6 py-3 text-sm font-medium">Image</th>
                        <th class="px-6 py-3 text-sm font-medium">Nama</th>
                        <th class="px-6 py-3 text-sm font-medium">Deskripsi</th>
                        <th class="px-6 py-3 text-sm font-medium">Kategori</th>
                        <th class="px-6 py-3 text-sm font-medium">Harga</th>
                        <th class="px-6 py-3 text-sm font-medium">Status</th>
                        <th class="px-6 py-3 text-sm font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center">
                    @forelse($products as $p)
                    <tr class="text-sm">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            @if($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" class="w-12 h-12 rounded mx-auto">
                            @else
                            <div class="w-12 h-12 bg-gray-200 rounded mx-auto"></div>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $p->name }}</td>
                        <td class="px-6 py-4">{{ $p->description }}</td>
                        <td class="px-6 py-4">{{ $p->category->name ?? 'Kategori tidak ditemukan' }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($p->price,0,',','.') }}</td>
                        <td class="px-6 py-4">
                            @if ($p->status === 'normal')
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700">
                                Normal
                            </span>
                            @elseif ($p->status === 'best_seller')
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-700">
                                Best Seller
                            </span>
                            @elseif ($p->status === 'recommended')
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-200 text-blue-700">
                                Recommended
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2">
                                <!-- Tombol Edit -->
                                @include('dashboard.Produk.modal.edit', ['p' => $p])

                                <!-- Tombol Delete -->
                                <form action="{{ route('dashboard.produk.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm flex items-center space-x-1 hover:bg-red-700 transition">
                                        <!-- Icon tong sampah -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-6 text-gray-500">Tidak ada produk</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end px-6 py-4 space-x-2">
            <template x-if="loadingTable">
                <div class="flex space-x-2">
                    <div class="h-8 w-8 bg-gray-200 rounded animate-pulse"></div>
                    <div class="h-8 w-8 bg-gray-200 rounded animate-pulse"></div>
                    <div class="h-8 w-8 bg-gray-200 rounded animate-pulse"></div>
                </div>
            </template>
            <template x-if="!loadingTable">
                <button class="px-3 py-1 border rounded-lg text-sm">1</button>
                <button class="px-3 py-1 border rounded-lg text-sm">2</button>
                <button class="px-3 py-1 border rounded-lg text-sm">3</button>
            </template>
        </div>
    </div>
</div>

</div>
@endsection