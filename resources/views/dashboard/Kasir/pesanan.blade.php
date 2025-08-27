@extends('layouts.app')

@section('content')
<div class="mx-auto">
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)"
        class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Section Kiri: Produk -->
        <div class="lg:col-span-2">
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <span class="text-yellow-500">🔥</span> Best Seller & Recommended
                </h2>

                <div x-data="{ loadingSpecial: true }" x-init="setTimeout(() => loadingSpecial = false, 1500)">
                    <!-- Skeleton Loading -->
                    <template x-if="loadingSpecial">
                        <div class="flex space-x-4 overflow-x-auto pb-3">
                            <!-- Skeleton Card -->
                            <template x-for="i in 3" :key="i">
                                <div class="min-w-[360px]">
                                    <div class="bg-white shadow-md rounded-2xl p-5 flex items-center animate-pulse">
                                        <!-- Gambar Skeleton -->
                                        <div class="w-28 h-28 bg-gray-200 rounded-xl"></div>

                                        <!-- Text Skeleton -->
                                        <div class="ml-4 flex-1 space-y-3">
                                            <div class="w-20 h-4 bg-gray-200 rounded"></div>
                                            <div class="w-32 h-5 bg-gray-200 rounded"></div>
                                            <div class="w-24 h-4 bg-gray-200 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- Produk Asli -->
                    <template x-if="!loadingSpecial">
                        <div
                            class="flex space-x-4 overflow-x-auto pb-3 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">

                            @forelse ($specialProducts as $product)
                            <div class="min-w-[360px]">
                                <div class="bg-gradient-to-r 
                    @if($product->status == 'best_seller') from-yellow-50 to-yellow-100 border-yellow-200
                    @elseif($product->status == 'recommended') from-blue-50 to-indigo-100 border-indigo-200
                    @endif
                    shadow-md rounded-2xl p-5 flex items-center">

                                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/120' }}"
                                        alt="{{ $product->name }}" class="w-28 h-28 object-cover rounded-xl shadow-sm">

                                    <div class="ml-4 flex-1">
                                        <span class="inline-block text-xs px-2 py-1 rounded-full mb-2
                            @if($product->status == 'best_seller') bg-yellow-400 text-white
                            @elseif($product->status == 'recommended') bg-indigo-500 text-white
                        @endif">
                                            {{ ucfirst(str_replace('_', ' ', $product->status)) }}
                                        </span>

                                        <h3 class="text-base font-semibold text-gray-800 py-1">{{ $product->name }}</h3>
                                        <p class="text-gray-500 text-sm mb-2">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-500">Belum ada produk Best Seller atau Recommended</p>
                            @endforelse
                        </div>
                    </template>
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

            <!-- Skeleton -->
            <template x-if="loading">
                <div class="space-y-4 animate-pulse">
                    <!-- Input Customer -->
                    <div>
                        <div class="h-4 w-32 bg-gray-300 rounded mb-2"></div>
                        <div class="h-9 w-full bg-gray-200 rounded"></div>
                    </div>

                    <!-- List Pesanan Dummy -->
                    <div class="space-y-3">
                        @for ($i = 0; $i < 2; $i++) <div
                            class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-300 rounded-lg"></div>
                                <div>
                                    <div class="h-4 w-24 bg-gray-300 rounded mb-2"></div>
                                    <div class="h-3 w-10 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <div class="h-4 w-16 bg-gray-300 rounded"></div>
                    </div>
                    @endfor
                </div>

                <!-- Total -->
                <div class="flex justify-between items-center border-t pt-4">
                    <div class="h-5 w-20 bg-gray-300 rounded"></div>
                    <div class="h-5 w-24 bg-gray-300 rounded"></div>
                </div>

                <!-- Tombol -->
                <div class="h-10 w-full bg-gray-300 rounded-lg"></div>
        </div>
        </template>

        <!-- Konten Asli -->
        <template x-if="!loading">
            <form action="{{ route('dashboard.kasir.pesanan.store') }}" method="POST">
                @csrf
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Masukkan nama customer..." class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none
                    @error('name') @enderror" />

                @error('customer_name')
                <p class="py-2 px-3 text-sm text-red-500">{{ $message }}</p>
                @enderror

                <!-- Hidden Input untuk items -->
                @foreach ($pesanans as $id => $psn)
                <input type="hidden" name="items[{{ $id }}][product_id]" value="{{ $id }}">
                <input type="hidden" name="items[{{ $id }}][qty]" value="{{ $psn['qty'] }}">
                <input type="hidden" name="items[{{ $id }}][total_price]" value="{{ $psn['total_price'] }}">
                @endforeach

                <!-- List Pesanan -->
                <ul class="space-y-4 py-5">
                    @php
                    $subtotal = $pesanans->sum('total_price');
                    $ppn = $subtotal * 0.03;
                    $total = $subtotal + $ppn;
                    @endphp
                    @forelse ($pesanans as $id => $psn)
                    <li class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gray-100 flex items-center justify-center rounded-lg">
                                @if($psn['image'])
                                <img src="{{ asset('storage/' . $psn['image']) }}" alt="{{ $psn['name'] }}"
                                    class="w-12 h-12 object-contain rounded-lg">
                                @else
                                <span class="text-gray-400 text-xs">IMG</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $psn['name'] }}</p>
                                <p class="text-xs text-gray-500">x {{ $psn['qty'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="font-medium text-green-600">
                                Rp {{ number_format($psn['total_price'], 0, ',', '.') }}
                            </span>

                            <!-- Tombol hapus -->
                            <form action="{{ route('dashboard.kasir.pesanan.destroy', $id) }}" method="POST"
                                onsubmit="return confirm('Hapus produk ini dari pesanan?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    ✖
                                </button>
                            </form>
                        </div>
                    </li>
                    @empty
                    <li class="text-gray-500 py-3 text-center">Belum ada pesanan</li>
                    @endforelse
                </ul>

                <!-- Metode Pembayaran -->
                <div class="relative w-full mt-4 border-t pt-4">
                    <h1 class="text-lg font-bold mb-4">Metode Pembayaran</h1>
                    <select id="payment_method" name="payment_method"
                        class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg text-sm focus:outline-none appearance-none">
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Input jumlah uang kasir -->
                <div id="cash-input" class="mt-3 hidden">
                    <label for="cash_amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Uang</label>
                    <input type="number" name="cash_amount" id="cash_amount" placeholder="Masukkan jumlah uang"
                        value="{{ old('cash_amount') }}"
                        class="px-3 py-2 border border-gray-300 rounded-lg w-full text-sm focus:outline-none" min="0"
                        step="0.01">
                    <p class="text-xs text-red-500 mt-1">* Masukkan nominal yang dibayar customer</p>
                </div>

                <script>
                    const paymentSelect = document.getElementById('payment_method');
                    const cashInput = document.getElementById('cash-input');

                    paymentSelect.addEventListener('change', () => {
                        if (paymentSelect.value === 'cash') {
                            cashInput.classList.remove('hidden');
                        } else {
                            cashInput.classList.add('hidden');
                        }
                    });
                </script>

                <!-- Total -->
                <div class="mt-6 flex justify-between items-center font-semibold text-lg border-t pt-4">
                    <span>Total</span>
                    <span class="text-green-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <!-- Tombol Checkout -->
                @if($pesanans->count() > 0)
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Checkout
                    </button>
                </div>
                @endif
            </form>
        </template>
    </div>

</div>
<!-- Script untuk toggle input Cash -->
<script>
    document.getElementById('payment_method').addEventListener('change', function () {
        let cashInput = document.getElementById('cash-input');
        if (this.value === 'cash') {
            cashInput.classList.remove('hidden');
        } else {
            cashInput.classList.add('hidden');
        }
    });
</script>

@endsection