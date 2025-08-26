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
            <!-- Header Action dengan Skeleton -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200"
                x-data="{ loadingHeader: true }" x-init="setTimeout(() => loadingHeader = false, 1000)">

                <!-- Skeleton -->
                <template x-if="loadingHeader">
                    <div class="flex items-center space-x-3 w-full">
                        <!-- Search skeleton -->
                        <div class="w-48 h-10 bg-gray-200 rounded animate-pulse"></div>
                        <!-- Tanggal skeleton -->
                        <div class="w-32 h-10 bg-gray-200 rounded animate-pulse"></div>
                        <!-- Filter button skeleton -->
                        <div class="w-24 h-10 bg-gray-200 rounded animate-pulse"></div>
                    </div>
                </template>

                <!-- Actual Form -->
                <template x-if="!loadingHeader">
                    <form method="GET" action="{{ route('dashboard.kasir.riwayat') }}"
                        class="flex items-center space-x-3">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari customer..."
                            class="border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-300">
                        <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                            class="border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring focus:ring-green-300">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
                            Filter
                        </button>
                    </form>
                </template>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-center">
                        <tr class="text-center">
                            <th class="px-6 py-3 text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-sm font-medium">Nama Customer</th>
                            <th class="px-6 py-3 text-sm font-medium">Status</th>
                            <th class="px-6 py-3 text-sm font-medium">Metode Pembayaran</th>
                            <th class="px-6 py-3 text-sm font-medium">Tanggal</th>
                            <th class="px-6 py-3 text-sm font-medium">Dibayar</th>
                            <th class="px-6 py-3 text-sm font-medium">Kembalian</th>
                            <th class="px-6 py-3 text-sm font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center">
                        @forelse($pesanan as $item)
                        <tr class="text-sm">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>

                            {{-- Nama customer --}}
                            <td class="px-6 py-4">
                                {{ $item->customer->name ?? '-' }}
                            </td>

                            {{-- Status pesanan --}}
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if($item->status == 'completed') bg-green-100 text-green-600
                                    @elseif($item->status == 'pending') bg-yellow-100 text-yellow-600
                                    @elseif($item->status == 'cancelled') bg-red-100 text-red-600
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>

                            {{-- Metode Pembayaran --}}
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if($item->payment_method == 'cash') bg-blue-100 text-blue-600
                                    @elseif($item->payment_method == 'qris') bg-purple-100 text-purple-600
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $item->payment_method)) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $item->created_at->format('d M Y, H:i') }}
                            </td>
                            {{-- Dibayar --}}
                            <td class="px-6 py-4 text-green-600 font-semibold">
                                @if($item->payment_method == 'cash')
                                Rp {{ number_format($item->cash_amount ?? 0, 0, ',', '.') }}
                                @elseif($item->payment_method == 'qris')
                                Rp {{ number_format($item->total_price, 0, ',', '.') }}
                                @else
                                -
                                @endif
                            </td>

                            {{-- Kembalian --}}
                            <td class="px-6 py-4 text-red-600 font-semibold">
                                @if($item->payment_method == 'cash' && $item->cash_amount)
                                Rp {{ number_format(max($item->cash_amount - $item->total_price, 0), 0, ',', '.') }}
                                @else
                                -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-2">

                                    <!-- Tombol Detail -->
                                    <a href="{{ route('dashboard.kasir.riwayat.detail', $item->id) }}"
                                        class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm flex items-center space-x-1 hover:bg-blue-700 transition">
                                        <!-- Icon mata -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>Detail</span>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('dashboard.kasir.pesanan.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="context" value="pesanan">
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
                            <td colspan="5" class="py-6 text-gray-500 text-center">Tidak ada pesanan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection