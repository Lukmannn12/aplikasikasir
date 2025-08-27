@extends('layouts.app')

@section('content')
<div class="mx-auto bg-white shadow-md rounded-2xl p-8 space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between border-b pb-4">
        <h2 class="text-3xl font-bold text-gray-900 tracking-wide">Detail Pesanan</h2>
    </div>

    {{-- Informasi Customer & Pesanan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-4 tracking-wide">👤 Informasi Customer</h3>
            <div class="space-y-3">
                <p class="text-base text-gray-700">
                    <span class="font-semibold text-gray-800">Nama:</span>
                    <span class="ml-2 text-gray-900">{{ $pesanan->customer->name }}</span>
                </p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Informasi Pesanan</h3>

            <div class="grid grid-cols-2 gap-y-3">
                <!-- Tanggal Pesanan -->
                <div class="text-gray-700 font-medium">Tanggal</div>
                <div class="text-gray-600">{{ $pesanan->created_at->format('d M Y, H:i') }}</div>

                <!-- Status Pesanan -->
                <div class="text-gray-700 font-medium">Status</div>
                <div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold tracking-wide
                @if($pesanan->status == 'completed') bg-green-100 text-green-700
                @elseif($pesanan->status == 'pending') bg-yellow-100 text-yellow-700
                @elseif($pesanan->status == 'cancelled') bg-red-100 text-red-700
                @else bg-green-400 text-white @endif">
                        {{ ucfirst($pesanan->status) }}
                    </span>
                </div>
            </div>
        </div>

    </div>

    {{-- Daftar Item Pesanan --}}
    <div>
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Item</h3>
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Produk</th>
                        <th class="px-6 py-3 text-center">Qty</th>
                        <th class="px-6 py-3 text-right">Harga</th>
                        <th class="px-6 py-3 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($pesanan->items as $i => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">{{ $i+1 }}</td>
                        <td class="px-6 py-3 font-medium text-gray-800">{{ $item->product->name }}</td>
                        <td class="px-6 py-3 text-center">{{ $item->quantity }}</td>
                        <td class="px-6 py-3 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-right font-semibold">Rp {{ number_format($item->subtotal, 0, ',', '.')
                            }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Total --}}
    <div class="mt-6 flex justify-end">
        <div class="bg-gray-50 p-6 rounded-xl shadow border w-full md:w-1/2 lg:w-1/3">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Ringkasan Pembayaran</h3>
            <div class="space-y-2 text-sm">
                {{-- Subtotal --}}
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="text-gray-800 font-medium">
                        Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Note PPN --}}
                <p class="text-xs text-gray-500 italic">
                    *Harga sudah termasuk PPN 3%
                </p>
            </div>

            {{-- Total Akhir --}}
            <div class="flex justify-between mt-4 border-t pt-3">
                <span class="text-lg font-bold text-gray-900">Total</span>
                <span class="text-xl font-extrabold text-blue-600">
                    Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex justify-between pt-4 border-t">
        <a href="{{ route('dashboard.kasir.riwayat') }}"
            class="px-5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg shadow-sm transition duration-200">
            ← Kembali
        </a>
        <button
            class="px-5 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg shadow-md transition duration-200">
            Cetak Struk
        </button>
    </div>

</div>
@endsection