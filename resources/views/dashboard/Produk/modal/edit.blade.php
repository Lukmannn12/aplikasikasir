<!-- Tombol Buka Modal -->
<div x-data="{ openModal: false }">
    <button @click="openModal = true"
        class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm flex items-center space-x-1 hover:bg-blue-700 transition">
        <!-- Icon pensil -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
        </svg>
        <span>Edit</span>
    </button>

    <!-- Modal -->
    <div x-show="openModal" x-transition class="fixed inset-0 z-50 pt-20 flex items-start justify-center bg-opacity-40"
        x-cloak>
        <div @click.away="openModal = false" class="bg-white rounded-lg shadow-lg w-full max-w-lg mx-2 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Edit Produk</h3>
                <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            <!-- Body -->
            <form method="POST" action="{{ route('dashboard.produk.update', $p->id) }}" enctype="multipart/form-data"
                class="space-y-3">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Nama Produk</label>
                    <input type="text" name="name" required value="{{ old('name', $p->name) }}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">
                </div>
                <!-- Deskripsi Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">{{ old('description', $p->description) }}</textarea>
                </div>

                <!-- Harga Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Harga</label>
                    <input type="number" name="price" required value="{{ old('price', $p->price) }}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">
                </div>

                {{-- Kategori Produk --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Kategori</label>
                    <select name="product_category_id" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id', $p->product_category_id)
                            == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Status</label>
                    <select name="status"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">
                        <option value="normal" {{ $p->status == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="best_seller" {{ $p->status == 'best_seller' ? 'selected' : '' }}>Best Seller
                        </option>
                        <option value="recommended" {{ $p->status == 'recommended' ? 'selected' : '' }}>Recommended
                        </option>
                    </select>
                </div>

                <!-- Ganti Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-left">Gambar Produk</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-gray-700 focus:outline-none">
                    @if($p->image)
                    <img src="{{ asset('storage/' . $p->image) }}" class="w-20 h-20 mt-2 rounded">
                    @endif
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