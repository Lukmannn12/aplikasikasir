<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gray-100">

    {{-- Alert Success --}}
    @if(session('success'))
    <div id="toast"
        class="fixed top-5 right-5 bg-green-500 text-white text-sm px-5 py-3 rounded shadow-md flex items-center justify-between min-w-[220px] opacity-0 transition-opacity duration-500">
        <span>{{ session('success') }}</span>
        <button onclick="closeToast()" class="ml-3 text-white hover:text-gray-200 font-bold">
            &times;
        </button>
    </div>

    <script>
        const toast = document.getElementById('toast');

        // tampilkan (fade in)
        setTimeout(() => {
            toast.classList.add('opacity-100');
        }, 100);

        // otomatis hilang (fade out)
        setTimeout(() => {
            closeToast();
        }, 3000);

        function closeToast() {
            toast.classList.remove('opacity-100');
            toast.classList.add('opacity-0');
            setTimeout(() => {
                toast.style.display = 'none';
            }, 500);
        }
    </script>
    @endif


    <!-- Background Curve -->
    <div class="absolute inset-0">
        <!-- Curve di sebelah kiri -->
        <div class="absolute left-0 top-0 h-full w-1/3 bg-emerald-500 rounded-r-full"></div>
    </div>

    <!-- Card Login -->
    <div class="relative z-10 w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <!-- Logo / Judul -->
        <div class="text-center mb-6">
            <div
                class="mx-auto w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                K
            </div>
            <h1 class="text-3xl font-bold text-emerald-600 mt-3">Aplikasi Kasir</h1>
            <p class="text-gray-500">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
        <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg">
            {{ $errors->first() }}
        </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <i class="ph ph-envelope text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                </div>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <i class="ph ph-lock text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded text-emerald-600">
                    <span>Ingat saya</span>
                </label>
                <a href="#" class="text-emerald-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit"
                class="w-full bg-emerald-600 text-white py-2 rounded-lg font-semibold hover:bg-emerald-700 transition-all duration-300 flex items-center justify-center gap-2">
                <i class="ph ph-sign-in"></i> Login
            </button>
        </form>
    </div>

</body>

</html>