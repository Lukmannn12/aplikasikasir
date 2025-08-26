<div id="sidebar" class="w-64 flex flex-col bg-white h-screen shadow-md transition-all duration-300">
    <div class="p-6 flex items-center space-x-3 border-b border-gray-200">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
        <span class="text-xl font-bold text-gray-800">KitaKasir</span>
    </div>
    <nav class="flex-1 px-3 py-6"
        x-data="{ openProduk: false, openKeuangan: false, openUser: false, openKasir: false }">

        <ul class="space-y-2">
            <!-- Dashboard -->
            <li class="border-b border-gray-200 py-2">
                <a href="{{ url('/dashboard') }}"
                    class="flex items-center px-3 py-2 rounded-lg transition
        {{ request()->is('dashboard') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }}">

                    <!-- Ikon Dashboard -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9.75L12 4l9 5.75V20a2 2 0 01-2 2H5a2 2 0 01-2-2V9.75z" />
                    </svg>

                    <span class="ml-2 text-sm">Dashboard</span>
                </a>
            </li>
            <!-- Manajemen Kasir -->
            <li class="border-gray-200 py-2"
                x-data="{ openKasir: {{ request()->is('dashboard/kasir/*') ? 'true' : 'false' }} }">

                <!-- Tombol utama -->
                <button @click="openKasir = !openKasir"
                    class="flex items-center justify-between w-full px-3 py-2 rounded-lg
            {{ request()->is('dashboard/kasir/*') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }} transition">

                    <div class="flex items-center space-x-2">
                        <!-- Ikon Kasir -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M9 21h6m-7-4h8a2 2 0 002-2V7a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm">Manajemen Kasir</span>
                    </div>

                    <!-- Panah expand -->
                    <svg :class="{'rotate-90': openKasir}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <ul x-show="openKasir" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="{{ route('dashboard.kasir.pesanan.index') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                {{ request()->is('dashboard/kasir/pesanan') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                            <!-- Ikon Pesanan -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            <span>Input Pesanan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.kasir.riwayat') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition
   {{ request()->is('dashboard/kasir/riwayat*') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                            <!-- Ikon Riwayat -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Riwayat Pesanan</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Manajemen Produk -->
            <li class="border-t border-b border-gray-200 py-2"
                x-data="{ openProduk: {{ request()->is('dashboard/produk/*') ? 'true' : 'false' }} }">

                <button @click="openProduk = !openProduk"
                    class="flex items-center justify-between w-full px-3 py-2 rounded-lg  
        {{ request()->is('dashboard/produk/*') ? 'bg-gray-100 text-blue-600' : 'text-gray-800 hover:bg-gray-100 hover:text-blue-600' }} transition">

                    <div class="flex items-center space-x-2">
                        <!-- Ikon Produk -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-2-2h-4l-2-2-2 2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2z" />
                        </svg>
                        <span class="text-sm">Manajemen Produk</span>
                    </div>

                    <svg :class="{'rotate-90': openProduk}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openProduk" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="{{ route('dashboard.produk.index') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                {{ request()->is('dashboard/produk/produkk') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            <!-- Ikon produk list -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.produk.kategori.index') }}"
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                {{ request()->is('dashboard/produk/kategori') ? 'bg-gray-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">
                            <!-- Ikon kategori -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h10M7 12h4m-2 5h8" />
                            </svg>
                            <span>Kategori Produk</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Manajemen Keuangan -->
            <li class="border-b border-gray-200 py-2" x-data="{ openKeuangan: false }">

                <button @click="openKeuangan = !openKeuangan" class="flex items-center justify-between w-full px-3 py-2 rounded-lg
        text-gray-800 hover:bg-gray-100 hover:text-blue-600 transition">

                    <div class="flex items-center space-x-2">
                        <!-- Ikon keuangan -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10v10m0 4v-4m8-4a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <span class="text-sm">Manajemen Keuangan</span>
                    </div>

                    <svg :class="{'rotate-90': openKeuangan}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openKeuangan" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="#" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-gray-600
                hover:bg-gray-100 hover:text-blue-600 transition">
                            <!-- Ikon laporan keuangan -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 11V7a4 4 0 018 0v4a4 4 0 01-8 0zM5 11h6m-6 4h6" />
                            </svg>
                            <span>Laporan Keuangan</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Manajemen User -->
            <li class="border-b border-gray-200 py-2" x-data="{ openUser: false }">

                <button @click="openUser = !openUser" class="flex items-center justify-between w-full px-3 py-2 rounded-lg
        text-gray-800 hover:bg-gray-100 hover:text-blue-600 transition">

                    <div class="flex items-center space-x-2">
                        <!-- Ikon user -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M9 4a4 4 0 110 8 4 4 0 010-8zm6 4a4 4 0 110 8 4 4 0 010-8z" />
                        </svg>
                        <span class="text-sm">Manajemen User</span>
                    </div>

                    <svg :class="{'rotate-90': openUser}" class="w-4 h-4 transition-transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <ul x-show="openUser" class="pl-6 mt-2 space-y-2 text-sm" x-cloak>
                    <li>
                        <a href="#" class="flex items-center space-x-2 px-3 py-2 rounded-lg text-gray-600
                hover:bg-gray-100 hover:text-blue-600 transition">
                            <!-- Ikon laporan user -->
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.79.676 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Laporan User</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>