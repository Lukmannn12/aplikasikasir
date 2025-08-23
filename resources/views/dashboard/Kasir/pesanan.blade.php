@extends('layouts.app')

@section('content')
<div class="mx-auto p-6">
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)"
        class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Section Kiri: Produk -->
        <div class="lg:col-span-2">
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <span class="text-yellow-500">🔥</span> Best Seller & Recommended
                </h2>

                <!-- Wrapper Scroll Horizontal -->
                <div
                    class="flex space-x-4 overflow-x-auto pb-3 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">

                    <!-- Card 1 -->
                    <div class="min-w-[360px]">
                        <!-- Skeleton -->
                        <template x-if="loading">
                            <div class="bg-gray-100 rounded-2xl p-5 flex items-center animate-pulse">
                                <div class="w-28 h-28 bg-gray-300 rounded-xl"></div>
                                <div class="ml-4 flex-1 space-y-3">
                                    <div class="w-20 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-32 h-5 bg-gray-300 rounded"></div>
                                    <div class="w-16 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-full h-9 bg-gray-300 rounded-lg"></div>
                                </div>
                            </div>
                        </template>

                        <!-- Produk -->
                        <template x-if="!loading">
                            <div
                                class="bg-gradient-to-r from-yellow-50 to-yellow-100 shadow-md rounded-2xl p-5 flex items-center">
                                <img src="https://via.placeholder.com/120" alt="Best Seller"
                                    class="w-28 h-28 object-cover rounded-xl border border-yellow-200 shadow-sm">
                                <div class="ml-4 flex-1">
                                    <span
                                        class="inline-block text-xs bg-yellow-400 text-white px-2 py-1 rounded-full mb-2">
                                        Best Seller
                                    </span>
                                    <h3 class="text-base font-semibold text-gray-800 py-1">Nasi Goreng Spesial</h3>
                                    <p class="text-gray-500 text-sm mb-2">Rp 25.000</p>
                                    <button
                                        class="w-full py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white rounded-lg text-sm font-medium shadow-md">
                                        + Tambah Pesanan
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Card 2 -->
                    <div class="min-w-[360px]">
                        <template x-if="loading">
                            <div class="bg-gray-100 rounded-2xl p-5 flex items-center animate-pulse">
                                <div class="w-28 h-28 bg-gray-300 rounded-xl"></div>
                                <div class="ml-4 flex-1 space-y-3">
                                    <div class="w-20 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-32 h-5 bg-gray-300 rounded"></div>
                                    <div class="w-16 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-full h-9 bg-gray-300 rounded-lg"></div>
                                </div>
                            </div>
                        </template>
                        <template x-if="!loading">
                            <div
                                class="bg-gradient-to-r from-yellow-50 to-yellow-100 shadow-md rounded-2xl p-5 flex items-center">
                                <img src="https://via.placeholder.com/120" alt="Best Seller"
                                    class="w-28 h-28 object-cover rounded-xl border border-yellow-200 shadow-sm">
                                <div class="ml-4 flex-1">
                                    <span
                                        class="inline-block text-xs bg-yellow-400 text-white px-2 py-1 rounded-full mb-2">
                                        Best Seller
                                    </span>
                                    <h3 class="text-base font-semibold text-gray-800 py-1">Ayam Bakar Madu</h3>
                                    <p class="text-gray-500 text-sm mb-2">Rp 30.000</p>
                                    <button
                                        class="w-full py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white rounded-lg text-sm font-medium shadow-md">
                                        + Tambah Pesanan
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Card 3 -->
                    <div class="min-w-[360px]">
                        <template x-if="loading">
                            <div class="bg-gray-100 rounded-2xl p-5 flex items-center animate-pulse">
                                <div class="w-28 h-28 bg-gray-300 rounded-xl"></div>
                                <div class="ml-4 flex-1 space-y-3">
                                    <div class="w-20 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-32 h-5 bg-gray-300 rounded"></div>
                                    <div class="w-16 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-full h-9 bg-gray-300 rounded-lg"></div>
                                </div>
                            </div>
                        </template>
                        <template x-if="!loading">
                            <div
                                class="bg-gradient-to-r from-blue-50 to-indigo-100 shadow-md rounded-2xl p-5 flex items-center">
                                <img src="https://via.placeholder.com/120" alt="Recommended"
                                    class="w-28 h-28 object-cover rounded-xl border border-indigo-200 shadow-sm">
                                <div class="ml-4 flex-1">
                                    <span
                                        class="inline-block text-xs bg-indigo-500 text-white px-2 py-1 rounded-full mb-2">
                                        Recommended
                                    </span>
                                    <h3 class="text-base font-semibold text-gray-800 py-1">Es Teh Manis Jumbo</h3>
                                    <p class="text-gray-500 text-sm mb-2">Rp 10.000</p>
                                    <button
                                        class="w-full py-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-lg text-sm font-medium shadow-md">
                                        + Tambah Pesanan
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Card 4 -->
                    <div class="min-w-[360px]">
                        <template x-if="loading">
                            <div class="bg-gray-100 rounded-2xl p-5 flex items-center animate-pulse">
                                <div class="w-28 h-28 bg-gray-300 rounded-xl"></div>
                                <div class="ml-4 flex-1 space-y-3">
                                    <div class="w-20 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-32 h-5 bg-gray-300 rounded"></div>
                                    <div class="w-16 h-4 bg-gray-300 rounded"></div>
                                    <div class="w-full h-9 bg-gray-300 rounded-lg"></div>
                                </div>
                            </div>
                        </template>
                        <template x-if="!loading">
                            <div
                                class="bg-gradient-to-r from-blue-50 to-indigo-100 shadow-md rounded-2xl p-5 flex items-center">
                                <img src="https://via.placeholder.com/120" alt="Recommended"
                                    class="w-28 h-28 object-cover rounded-xl border border-indigo-200 shadow-sm">
                                <div class="ml-4 flex-1">
                                    <span
                                        class="inline-block text-xs bg-indigo-500 text-white px-2 py-1 rounded-full mb-2">
                                        Recommended
                                    </span>
                                    <h3 class="text-base font-semibold text-gray-800 py-1">Es Teh Manis Jumbo</h3>
                                    <p class="text-gray-500 text-sm mb-2">Rp 10.000</p>
                                    <button
                                        class="w-full py-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-lg text-sm font-medium shadow-md">
                                        + Tambah Pesanan
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
            <!-- Tombol Kategori -->
            <div class="flex space-x-3 mb-6">
                <a href="{{ route('dashboard.kasir.pesanan.index') }}"
                    class="px-4 py-2 text-sm rounded-full {{ request('category_id') == null ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200 hover:text-blue-600' }}">
                    All Menu
                </a>
                @foreach($categories as $category)
                <a href="{{ route('dashboard.kasir.pesanan.index', ['category_id' => $category->id]) }}"
                    class="px-4 py-2 text-sm rounded-full {{ request('category_id') == $category->id ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200 hover:text-blue-600' }}">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>

            <!-- Daftar Produk -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($produk as $p)
                <div>
                    <!-- Skeleton -->
                    <template x-if="loading">
                        <div class="bg-gray-100 rounded-lg p-4 flex flex-col items-center animate-pulse">
                            <div class="w-24 h-24 bg-gray-300 rounded mb-3"></div>
                            <div class="w-full space-y-2">
                                <div class="h-4 w-1/2 bg-gray-300 rounded"></div>
                                <div class="h-3 w-1/3 bg-gray-300 rounded"></div>
                            </div>
                            <div class="mt-4 w-full h-9 bg-gray-300 rounded-lg"></div>
                        </div>
                    </template>

                    <!-- Produk Asli -->
                    <template x-if="!loading">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            @if($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}"
                                class="w-full h-40 object-cover">
                            @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">No Image</span>
                            </div>
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $p->name }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ $p->description ?? 'Tidak ada deskripsi.' }}
                                </p>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-green-600 font-bold">Rp {{ number_format($p->price,0,',','.')
                                        }}</span>
                                    <button
                                        class="px-7 py-1 bg-green-500 text-white text-sm rounded-lg hover:bg-green-600 transition">
                                        Beli
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    Tidak ada produk
                </div>
                @endforelse
            </div>

        </div>


        <!-- Section Kanan: Detail Produk -->
        <div class="bg-white p-6 rounded shadow">
            @include('dashboard.kasir.detailproduk')
        </div>
    </div>


    @endsection