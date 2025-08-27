@extends('layouts.app')

@section('content')
<div class="mx-auto">

    <!-- Judul -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Laporan Keuangan
    </h1>

    <!-- Tabel Laporan -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Header Action -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
            <!-- Filter Bulan -->
            <form method="GET" class="flex items-center space-x-3">
                <label for="bulan" class="text-sm font-medium text-gray-600">Bulan:</label>

                <div class="relative">
                    <select id="bulan" name="bulan"
                        class="appearance-none border border-gray-200 rounded-lg pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring focus:ring-gray-300">
                        <option value="">-- Semua Bulan --</option>
                        @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $bulan==$m ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                        </option>
                        @endforeach
                    </select>
                    <!-- Icon dropdown -->
                    <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <button type="submit"
                    class="bg-emerald-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-600">
                    Filter
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-center">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium">Tanggal</th>
                        <th class="px-6 py-3 text-sm font-medium">Jumlah Transaksi</th>
                        <th class="px-6 py-3 text-sm font-medium">Total Pendapatan</th>
                        <th class="px-6 py-3 text-sm font-medium">Tunai (Cash)</th>
                        <th class="px-6 py-3 text-sm font-medium">QRIS / Transfer</th>
                        <th class="px-6 py-3 text-sm font-medium">Kembalian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center text-sm">
                    @forelse($laporan as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $row['tanggal'] }}</td>
                        <td class="px-6 py-4">{{ $row['jumlah_transaksi'] }}</td>
                        <td class="px-6 py-4 text-green-600 font-semibold">
                            Rp {{ number_format($row['total_pendapatan'], 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">Rp {{ number_format($row['total_cash'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($row['total_non_cash'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-red-600">Rp {{ number_format($row['total_kembalian'], 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-6 text-gray-500">Tidak ada data transaksi bulan ini</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-gray-100 font-semibold text-sm text-center">
                    <tr>
                        <td class="px-6 py-3 text-right" colspan="2">Total Bulan Ini:</td>
                        <td class="px-6 py-3 text-green-600">
                            Rp {{ number_format($totalBulan['pendapatan'], 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-3">Rp {{ number_format($totalBulan['cash'], 0, ',', '.') }}</td>
                        <td class="px-6 py-3">Rp {{ number_format($totalBulan['non_cash'], 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-red-600">Rp {{ number_format($totalBulan['kembalian'], 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection