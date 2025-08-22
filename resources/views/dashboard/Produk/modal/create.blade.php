<!-- Tombol Buka Modal -->
<div x-data="{ openModal: false }">
    <button @click="openModal = true"
        class="rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">
        + Tambah Produk
    </button>

    <!-- Modal -->
    <div x-show="openModal" x-transition
         class="fixed inset-0 z-50 pt-40 flex items-start justify-center"
         x-cloak>
        <div @click.away="openModal = false"
             class="bg-white rounded-lg shadow-lg w-full max-w-md mx-2 p-6">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Produk</h3>
                <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Body -->
            <form class="space-y-3">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text"
                           class="w-full border rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea class="w-full border rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Harga</label>
                    <input type="number"
                           class="w-full border rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number"
                           class="w-full border rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Image</label>
                    <input type="file" class="w-full text-sm">
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-4 flex justify-end space-x-2">
                <button @click="openModal = false"
                        class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm">Batal</button>
                <button class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800 text-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
