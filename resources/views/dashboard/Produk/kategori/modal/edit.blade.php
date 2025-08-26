<!-- Tombol Buka Modal -->
<div x-data="{ openModal: false }">
    <button @click="openModal = true"
        class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm mx-1 flex items-center space-x-1">
        <!-- Icon pensil -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
        </svg>
        <span>Edit</span>
    </button>

    <!-- Modal -->
    <div x-show="openModal" x-transition class="fixed inset-0 z-50 pt-40 flex items-start justify-center bg-opacity-40"
        x-cloak>
        <div @click.away="openModal = false" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-2 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Edit Kategori</h3>
                <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Body -->
            <form method="POST" action="{{ route('dashboard.produk.kategori.update', $kategori->id) }}" class="space-y-3">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium mb-1 text-left">Nama Kategori</label>
                    <input type="text" name="name" required
                        value="{{ old('name', $kategori->name) }}"
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
