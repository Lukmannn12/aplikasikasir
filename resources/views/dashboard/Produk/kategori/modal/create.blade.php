<!-- Tombol Buka Modal -->
<div x-data="{ openModal: false }">
    <button @click="openModal = true"
        class="rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">
        + Tambah Kategori
    </button>

    <!-- Modal -->
    <div x-show="openModal" x-transition
         class="fixed inset-0 z-50 pt-40 flex items-start justify-center bg-opacity-40"
         x-cloak>
        <div @click.away="openModal = false"
             class="bg-white rounded-lg shadow-lg w-full max-w-md mx-2 p-6">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Kategori</h3>
                <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Body -->
            <form method="POST" action="{{ route('dashboard.produk.kategori.store') }}" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Kategori</label>
                    <input type="text" name="name" required
                           class="w-full border rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200">
                </div>

                <!-- Footer -->
                <div class="mt-4 flex justify-end space-x-2">
                    <button type="button" @click="openModal = false"
                            class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm">Batal</button>
                    <button type="submit"
                            class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800 text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
