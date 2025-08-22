<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
   

    {{-- Content --}}
    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        <nav class="bg-white shadow p-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="text-gray-600 hover:text-black">
                ☰
            </button>
            <div class="text-sm text-gray-700">Admin</div>
        </nav>

        {{-- Main Content --}}
        <main class="p-6">
            <h1 class="text-2xl font-semibold mb-4">Welcome to Admin Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded shadow">Card 1</div>
                <div class="bg-white p-4 rounded shadow">Card 2</div>
                <div class="bg-white p-4 rounded shadow">Card 3</div>
            </div>
        </main>
    </div>

</body>
</html>
