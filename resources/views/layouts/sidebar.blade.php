<div id="sidebar" class="w-64 flex flex-col bg-white h-screen shadow-md transition-all duration-300">
    <div class="p-6 flex items-center space-x-3 border-b border-gray-200">
        <img src="https://via.placeholder.com/40" alt="Logo" class="w-10 h-10 rounded-full">
        <span class="text-xl font-bold text-gray-800">KasirApp</span>
    </div>
    <nav class="flex-1 px-4 py-6"
        x-data="{ openProduk: false, openKeuangan: false, openUser: false, openKasir: false }">

        <ul class="space-y-2">
            <!-- Dashboard -->
            <li class="border-b border-gray-200 py-2">
                <a href="{{ url('/') }}"
                    class="flex items-center px-3 py-2 rounded-lg transition
                    {{ request()->is('/') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }}">
                    <span class="ml-2 text-sm">Dashboard</span>
                </a>
            </li>
            <!-- Manajemen Kasir -->
            <li class="border-gray-200 py-2"
                x-data="{ openKasir: {{ request()->is('dashboard/kasir/*') ? 'true' : 'false' }} }">

                <button @click="openKasir = !openKasir"
                    class="flex items-center justify-between w-full px-3 py-2 rounded-lg
                        {{ request()->is('dashboard/kasir/*') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }} transition">

                    <span class="ml-2 text-sm">Manajemen Kasir</span>
                    <svg :class="{'rotate-90': openKasir}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openKasir" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="{{ route('dashboard.kasir.pesanan') }}"
                            class="block px-3 py-2 rounded-lg transition 
                            {{ request()->is('dashboard/kasir/pesanan') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            Input Pesanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.kasir.riwayat') }}"
                            class="block px-3 py-2 rounded-lg transition
                {{ request()->is('dashboard/kasir/riwayat') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            Riwayat Pesanan
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Manajemen Produk -->
            <li class="border-t border-b border-gray-200 py-2" x-data="{ openProduk: {{ request()->is('dashboard/produk/*') ? 'true' : 'false' }} }">
                <button @click="openProduk = !openProduk" class="flex items-center justify-between w-full px-3 py-2 rounded-lg  {{ request()->is('dashboard/produk/*') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }} transition">
                    <span class="ml-2 text-sm">Manajemen Produk</span>
                    <svg :class="{'rotate-90': openProduk}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="openProduk" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="{{ route('dashboard.produk.index') }}"
                            class="block px-3 py-2 rounded-lg transition 
                            {{ request()->is('dashboard/produk/index') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.produk.kategori') }}"
                            class="block px-3 py-2 rounded-lg transition 
                            {{ request()->is('dashboard/produk/kategori') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            Kategori Produk
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Manajemen Keuangan -->
            <li class="border-b border-gray-200 py-2">
                <button @click="openKeuangan = !openKeuangan" class="flex items-center justify-between w-full px-3 py-2 rounded-lg
                    text-gray-800 hover:bg-gray-100 hover:text-blue-600 transition">
                    <span class="ml-2 text-sm">Manajemen Keuangan</span>
                    <svg :class="{'rotate-90': openKeuangan}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="openKeuangan" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="#" class="block px-3 py-2 rounded-lg text-gray-600
                           hover:bg-gray-100 hover:text-blue-600 transition">
                            Laporan Keuangan
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Manajemen User -->
            <li class="border-b border-gray-200 py-2">
                <button @click="openUser = !openUser" class="flex items-center justify-between w-full px-3 py-2 rounded-lg
                    text-gray-800 hover:bg-gray-100 hover:text-blue-600 transition">
                    <span class="ml-2 text-sm">Manajemen User</span>
                    <svg :class="{'rotate-90': openUser}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="openUser" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="#" class="block px-3 py-2 rounded-lg text-gray-600
                           hover:bg-gray-100 hover:text-blue-600 transition">
                            Laporan User
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>