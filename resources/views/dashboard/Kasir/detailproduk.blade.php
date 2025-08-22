<h2 class="text-lg font-bold mb-4">Detail Pesanan</h2>

<!-- Input Nama Customer -->
<div class="mb-4" x-show="!loading">
    <label for="customerName" class="block text-sm font-medium text-gray-700 mb-1">Nama Customer</label>
    <input type="text" id="customerName" name="customerName" placeholder="Masukkan nama customer"
        class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none" />
</div>

<!-- Skeleton Loading Pesanan -->
<template x-if="loading">
    <div class="space-y-3">
        <div class="h-6 bg-gray-300 rounded w-2/3 animate-pulse"></div>
        <div class="h-6 bg-gray-300 rounded w-1/2 animate-pulse"></div>
        <div class="h-6 bg-gray-300 rounded w-3/4 animate-pulse"></div>
    </div>
</template>

<!-- List Pesanan -->
<template x-if="!loading">
    <ul class="divide-y divide-gray-200">
        <li class="py-3 flex justify-between items-center">
            <div class="space-y-1">
                <p class="font-medium text-base">Nasi Goreng</p>
                <div class="flex items-center space-x-2 text-[12px] text-gray-500">
                    <span>Qty:</span>

                    <!-- Tombol Kurang -->
                    <button
                        class="w-6 h-6 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300">-</button>

                    <!-- Angka Quantity -->
                    <span class="w-6 text-center">2</span>

                    <!-- Tombol Tambah -->
                    <button
                        class="w-6 h-6 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300">+</button>

                    <span>x Rp 20.000</span>
                </div>
            </div>
            <span class="font-semibold text-base">Rp 40.000</span>
        </li>
    </ul>
</template>

<!-- Total -->
<div class="mt-4 border-t pt-4 flex justify-between items-center font-bold" x-show="!loading">
    <span>Total</span>
    <span>Rp 55.000</span>
</div>
<!-- Metode Pembayaran -->
<div class="mt-4">

    <!-- Skeleton Loading -->
    <template x-if="loading">
        <div class="space-y-3 animate-pulse">
            <div class="h-4 w-32 bg-gray-300 rounded"></div>
            <div class="h-10 w-full bg-gray-300 rounded"></div>
            <div class="h-4 w-40 bg-gray-300 rounded"></div>
            <div class="h-10 w-full bg-gray-300 rounded"></div>
        </div>
    </template>

    <!-- Metode Pembayaran Asli -->
    <template x-if="!loading">
        <div x-data="{ metode: 'qris' }">
            <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
            <select x-model="metode"
                class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none ">
                <option value="qris">QRIS</option>
                <option value="cash">Cash</option>
            </select>

            <!-- Input jika pilih Cash -->
            <div class="mt-3" x-show="metode === 'cash'">
                <label for="cashAmount" class="block text-sm font-medium text-gray-700 mb-1">Nominal Uang</label>
                <input type="number" id="cashAmount" placeholder="Masukkan nominal (misal 50000)"
                    class="w-full px-3 py-2 border text-gray-600 border-gray-500 rounded-lg text-sm focus:outline-none">
            </div>
        </div>
    </template>
</div>


<!-- Tombol Checkout -->
<button class="mt-6 w-full bg-green-500 text-sm font-semibold text-white py-2 px-4 rounded-lg" x-show="!loading">
    Checkout
</button>