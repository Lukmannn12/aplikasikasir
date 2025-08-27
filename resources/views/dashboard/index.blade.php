@extends('layouts.app')

@section('content')
<div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">
    <div class="mx-auto">
        <h1
            class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
            Dashboard
        </h1>
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
                            <p class="text-2xl font-bold text-gray-800">{{ $produk?? 0 }}</p>
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
                            <p class="text-2xl font-bold text-gray-800">{{ $category ?? 0 }}</p>
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
                            <p class="text-2xl font-bold text-gray-800">{{ $user ?? 0 }}</p>
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
                            <p class="text-2xl font-bold text-gray-800">{{ $totalOrders ?? 0 }}</p>
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

        <div class="mx-auto px-4 py-8">
            <!-- Grid Grafik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                <!-- Grafik Pemasukan Bulanan -->
                <div class="bg-white shadow-md rounded-xl p-5">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">Pemasukan Bulanan</h2>
                    <canvas id="incomeChart" class="w-full h-48"></canvas>
                </div>

                <!-- Grafik User Baru -->
                <div class="bg-white shadow-md rounded-xl p-5">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">User Baru</h2>
                    <canvas id="userChart" class="w-full h-48"></canvas>
                </div>

            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Grafik Pemasukan Bulanan (Line dengan Animasi)
    new Chart(document.getElementById('incomeChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pemasukan',
                data: [2000000, 3500000, 2800000, 4000000, 3700000, 5000000],
                borderColor: 'rgb(59, 130, 246)', // biru
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 6,
                pointBackgroundColor: 'rgb(59, 130, 246)',
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 2000, // durasi animasi (ms)
                easing: 'easeOutQuart' // efek animasi
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let value = context.raw;
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                legend: {
                    display: true,
                    labels: {
                        color: '#374151' // abu-abu gelap
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });


    // Grafik User Baru (Bar)
    new Chart(document.getElementById('userChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'User Baru',
                data: [50, 70, 60, 100, 90, 120],
                backgroundColor: '#8B5CF6'
            }]
        }
    });
        </script>




    </div>
</div>
@endsection