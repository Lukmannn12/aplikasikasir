@extends('layouts.app')

@section('content')
<div class="py-6" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">
    <div class="mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h2>

        <!-- Card Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <!-- Total Produk -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
                <template x-if="loading">
                    <div class="w-full animate-pulse flex justify-between items-center">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-24"></div>
                            <div class="h-6 bg-gray-200 rounded w-16"></div>
                        </div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                    </div>
                </template>
                <template x-if="!loading">
                    <div class="w-full flex justify-between items-center">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-500">Total Produk</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalProduk ?? 0 }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-boxes-stacked text-green-600 text-xl"></i>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Total Kategori -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
                <template x-if="loading">
                    <div class="w-full animate-pulse flex justify-between items-center">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-24"></div>
                            <div class="h-6 bg-gray-200 rounded w-16"></div>
                        </div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                    </div>
                </template>
                <template x-if="!loading">
                    <div class="w-full flex justify-between items-center">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-500">Total Kategori</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalKategori ?? 0 }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-layer-group text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Total User -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
                <template x-if="loading">
                    <div class="w-full animate-pulse flex justify-between items-center">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-24"></div>
                            <div class="h-6 bg-gray-200 rounded w-16"></div>
                        </div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                    </div>
                </template>
                <template x-if="!loading">
                    <div class="w-full flex justify-between items-center">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-500">Total User</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalUser ?? 0 }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-user-friends text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Total Order -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
                <template x-if="loading">
                    <div class="w-full animate-pulse flex justify-between items-center">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-24"></div>
                            <div class="h-6 bg-gray-200 rounded w-16"></div>
                        </div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                    </div>
                </template>
                <template x-if="!loading">
                    <div class="w-full flex justify-between items-center">
                        <div class="space-y-2">
                            <h3 class="text-sm font-medium text-gray-500">Total Order</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalOrder ?? 0 }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-receipt text-red-600 text-xl"></i>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Total Pemasukan -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
                <template x-if="loading">
                    <div class="w-full animate-pulse flex justify-between items-center">
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-200 rounded w-24"></div>
                            <div class="h-6 bg-gray-200 rounded w-20"></div>
                        </div>
                        <div class="h-10 w-10 bg-gray-200 rounded-full"></div>
                    </div>
                </template>
                <template x-if="!loading">
                    <div class="w-full flex justify-between items-center">
                        <div class="space-y-2">
                            <h2 class="text-sm font-medium text-gray-500">Total Pemasukan</h2>
                            <p class="text-2xl font-bold text-gray-800">
                                Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-money-bill-wave text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection
