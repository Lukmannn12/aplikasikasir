<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'KasirApp') }}</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Tailwind Plus Elements -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1/dist/tpe.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <script defer>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-ml-64');
        }
    </script>
</head>

<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Content --}}
    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Main Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Alert Message --}}
    @if(session('success'))
    <div id="toast"
        class="fixed top-5 right-5 bg-green-500 text-white text-sm px-5 py-3 rounded shadow-md flex items-center justify-between min-w-[200px] opacity-0 transition-opacity duration-500 ease-in-out">
        <span>{{ session('success') }}</span>
        <button onclick="hideToast()" class="ml-3 text-white hover:text-gray-200 font-bold">
            &times;
        </button>
    </div>

    <script>
        const toast = document.getElementById('toast');

        // Fade in
        setTimeout(() => {
            toast.classList.add('opacity-100');
        }, 100); 

        // Auto fade out
        setTimeout(() => {
            hideToast();
        }, 3000);

        function hideToast() {
            toast.classList.remove('opacity-100');
            toast.classList.add('opacity-0');
            setTimeout(() => toast.style.display = 'none', 500); // tunggu animasi selesai
        }
    </script>
    @endif


    @if(session('error'))
    <script>
        Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000
            });
    </script>
    @endif

</body>

</html>