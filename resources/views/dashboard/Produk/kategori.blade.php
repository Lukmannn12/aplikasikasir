@extends('layouts.app')

@section('content')
<div class="mx-auto" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <!-- Judul (tidak ada skeleton) -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Kategori Produk
    </h1>


    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div x-data="{ loadingTable: true }" x-init="setTimeout(() => loadingTable = false, 2000)">
            <!-- Header Action -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <template x-if="loadingTable">
                    <div class="w-32 h-8 bg-gray-200 rounded animate-pulse"></div>
                </template>
                <template x-if="!loadingTable">
                    <a href="#"
                        class="bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">+
                        Tambah Kategori</a>
                </template>

                <!-- Search Box -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        <input type="text" placeholder="Cari produk..."
                            class="border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-300">
                    </template>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-center">
                        <tr class="text-center">
                            <th class="px-6 py-3 text-sm font-medium">Kategori</th>
                            <th class="px-6 py-3 text-sm font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center">
                        <!-- Skeleton Rows -->
                        <template x-if="loadingTable">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="w-12 h-12 bg-gray-200 rounded mx-auto animate-pulse"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-8 w-20 bg-gray-200 rounded mx-auto animate-pulse"></div>
                                </td>
                            </tr>
                        </template>

                        <!-- Real Data Rows -->
                        <template x-if="!loadingTable">
                            <tr>
                                <td class="px-6 py-4">Kategori A</td>
                                <td class="px-6 py-4">
                                    <button
                                        class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm mx-1">Edit</button>
                                    <button
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm mx-1">Hapus</button>
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