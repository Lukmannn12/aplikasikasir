<!-- Tombol Buka Modal -->
<div x-data="{ openModal: false }">
    <button @click="openModal = true"
        class="rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">
        + Tambah Produk
    </button>

    <!-- Modal -->
    <div x-show="openModal" x-transition class="fixed inset-0 z-50 pt-40 flex items-start justify-center" x-cloak>
        <div @click.away="openModal = false" class="bg-white rounded-lg shadow-lg w-full max-w-md mx-2 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Produk</h3>
                <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Body -->
            <form action="{{ route('dashboard.produk.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <!-- Nama Produk -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan nama produk"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" placeholder="Masukkan deskripsi produk"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <!-- Harga -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <input type="number" name="price" id="price" placeholder="Masukkan harga produk"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>


                <!-- Kategori -->
                <div>
                    <label for="product_category_id"
                        class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="product_category_id" id="product_category_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="normal">Normal</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="recommended">Recommended</option>
                    </select>
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" name="image" id="image" class="w-full text-sm text-gray-600">
                </div>

                <!-- Footer Buttons -->
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" @click="openModal=false"
                        class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-sm">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800 text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>