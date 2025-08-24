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
                                class="w-32 h-32 mx-auto my-4 object-contain">
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
                                    <form action="{{ route('dashboard.kasir.pesanan.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $p->id }}">
                                        <button type="submit"
                                            class="px-7 py-1 bg-green-500 text-white text-sm rounded-lg hover:bg-green-600 transition">
                                            Beli
                                        </button>
                                    </form>
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
            <h2 class="text-lg font-bold mb-4">Detail Pesanan</h2>

            <!-- Input Nama Customer -->
            <div class="mb-4">
                <label for="customerName" class="block text-sm font-medium text-gray-700 mb-1">Nama Customer</label>
                <input type="text" id="customerName" name="customerName" placeholder="Masukkan nama customer"
                    class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none" />
            </div>

            <!-- List Pesanan -->
            <ul class="space-y-4">
                @php $total = 0; @endphp
                @forelse ($pesanans as $id => $psn)
                <li class="flex items-center justify-between bg-white shadow-md rounded-xl p-4">
                    <div class="flex items-center space-x-4">
                        {{-- Gambar produk --}}
                        <div class="w-16 h-16 bg-gray-100 flex items-center justify-center rounded-lg">
                            @if($psn['image'])
                            <img src="{{ asset('storage/' . $psn['image']) }}" alt="{{ $psn['name'] }}"
                                class="w-16 h-16 object-contain rounded-lg">
                            @else
                            <span class="text-gray-400 text-xs">IMG</span>
                            @endif
                        </div>

                        {{-- Nama & Qty --}}
                        <div>
                            <p class="font-semibold text-gray-800">{{ $psn['name'] }}</p>
                            <div class="flex items-center space-x-2 mt-1">
                                {{-- Qty --}}
                                <span class="px-3 py-1 bg-gray-100 rounded-md">{{ $psn['qty'] }}</span>

                                {{-- Button Plus --}}
                                <form action="{{ route('dashboard.kasir.pesanan.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="plus">
                                    <button type="submit"
                                        class="w-7 h-7 flex items-center justify-center bg-gray-200 rounded-full">+</button>
                                </form>

                                {{-- Button Minus --}}
                                <form action="{{ route('dashboard.kasir.pesanan.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="minus">
                                    <button type="submit"
                                        class="w-7 h-7 flex items-center justify-center bg-gray-200 rounded-full">-</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="text-right space-y-2">
                        <p class="font-semibold text-green-600">
                            Rp {{ number_format($psn['total_price'], 0, ',', '.') }}
                        </p>
                        <form action="{{ route('dashboard.kasir.pesanan.destroy', $id) }}" method="POST"
                            onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm hover:underline">Hapus</button>
                        </form>
                    </div>
                </li>

                @php $total += $psn['total_price']; @endphp
                @empty
                <li class="text-gray-500 py-3 text-center">Belum ada pesanan</li>
                @endforelse
            </ul>

            {{-- Total --}}
            @if($pesanans->count() > 0)
            <div class="mt-6 flex justify-between items-center font-semibold text-lg border-t pt-4">
                <span>Total</span>
                <span class="text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            @endif


            <!-- Metode Pembayaran -->
            <div class="mt-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Metode
                    Pembayaran</label>
                <select name="payment_method" id="payment_method"
                    class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none">
                    <option value="qris">QRIS</option>
                    <option value="cash">Cash</option>
                </select>

                <div class="mt-3" id="cashInput" style="display:none;">
                    <label for="cashAmount" class="block text-sm font-medium text-gray-700 mb-1">Nominal Uang</label>
                    <input type="number" id="cashAmount" name="cashAmount" placeholder="Masukkan nominal (misal 50000)"
                        class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none">
                </div>
            </div>

            <!-- Tombol Checkout -->
            <form action="" method="POST">

                <button type="submit"
                    class="mt-6 w-full bg-green-500 text-sm font-semibold text-white py-2 px-4 rounded-lg">
                    Checkout
                </button>
            </form>

            <!-- JS untuk menampilkan input cash jika dipilih -->
            <script>
                const paymentSelect = document.getElementById('payment_method');
    const cashInput = document.getElementById('cashInput');

    paymentSelect.addEventListener('change', function() {
        if(this.value === 'cash') {
            cashInput.style.display = 'block';
        } else {
            cashInput.style.display = 'none';
        }
    });
            </script>

        </div>
    </div>


    @endsection