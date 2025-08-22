@extends('layouts.app')

@section('content')
<div class="mx-auto" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <!-- Judul -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Riwayat Pesanan
    </h1>

    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div x-data="{ loadingTable: true }" x-init="setTimeout(() => loadingTable = false, 2000)">
            <!-- Header Action -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <template x-if="loadingTable">
                    <div class="w-32 h-8 bg-gray-200 rounded animate-pulse"></div>
                </template>

                <!-- Search Box -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        <input type="text" placeholder="Cari customer......"
                            class="border rounded-lg px-5 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-300">
                    </template>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-sm font-medium">Nama Customer</th>
                            <th class="px-6 py-3 text-sm font-medium">Produk</th>
                            <th class="px-6 py-3 text-sm font-medium">Jumlah</th>
                            <th class="px-6 py-3 text-sm font-medium">Total Harga</th>
                            <th class="px-6 py-3 text-sm font-medium">Tanggal</th>
                            <th class="px-6 py-3 text-sm font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Skeleton Rows -->
                        <template x-if="loadingTable">
                            <tr>
                                <td colspan="7" class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded animate-pulse w-full"></div>
                                </td>
                            </tr>
                        </template>

                        <!-- Real Data Rows -->
                        <template x-if="!loadingTable">
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-700">1</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Budi Santoso</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Nasi Goreng</td>
                                <td class="px-6 py-4 text-sm text-gray-700">2</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 50.000</td>
                                <td class="px-6 py-4 text-sm text-gray-700">22/08/2025</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                        Selesai
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-700">2</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Siti Aminah</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Ayam Bakar</td>
                                <td class="px-6 py-4 text-sm text-gray-700">1</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 30.000</td>
                                <td class="px-6 py-4 text-sm text-gray-700">22/08/2025</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                        Diproses
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-700">3</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Andi Pratama</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Es Teh Manis</td>
                                <td class="px-6 py-4 text-sm text-gray-700">3</td>
                                <td class="px-6 py-4 text-sm text-gray-700">Rp 30.000</td>
                                <td class="px-6 py-4 text-sm text-gray-700">22/08/2025</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                        Dibatalkan
                                    </span>
                                </td>
                            </tr>
                        </template>
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
