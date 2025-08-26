<div x-data="{ openModal: false }">
    <!-- Tombol Checkout -->
    <button @click="openModal = true"
        class="mt-6 w-full bg-green-500 text-sm font-semibold text-white py-2 px-4 rounded-lg">
        Checkout
    </button>

    <!-- Modal -->
    <div x-show="openModal" 
         class="fixed inset-0 flex items-start pt-48 justify-center bg-opacity-50 z-50"
         x-transition>
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
            
            <!-- Tombol Close -->
            <button @click="openModal = false" 
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>
            
            <!-- Judul -->
            <h2 class="text-xl font-semibold mb-4">Detail Pesanan</h2>

            <!-- Isi Pesanan -->
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Nama Produk</span>
                    <span class="font-semibold">Produk A</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Jumlah</span>
                    <span class="font-semibold">2</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Harga Satuan</span>
                    <span class="font-semibold">Rp 50.000</span>
                </div>
                <div class="flex justify-between border-t pt-2">
                    <span class="text-gray-800 font-bold">Total</span>
                    <span class="font-bold text-green-600">Rp 100.000</span>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-6 flex justify-end gap-2">
                <button @click="openModal = false" 
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                    Batal
                </button>
                <form action="/checkout" method="POST">
                    @csrf
                    <button type="submit" 
                            class="bg-green-500 text-white px-4 py-2 rounded-lg">
                        Konfirmasi Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>