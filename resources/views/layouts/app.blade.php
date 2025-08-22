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
</body>

</html>