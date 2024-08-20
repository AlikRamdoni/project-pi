<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Link ke CSS atau framework CSS seperti Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        <header class="bg-gray-800 text-white py-4">
            <div class="container mx-auto px-4">
                <h1 class="text-lg font-semibold">Dashboard Admin</h1>
                <!-- Tambahkan menu navigasi atau informasi lainnya di sini -->
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto px-4 text-center">
                &copy; {{ date('Y') }} Admin Panel. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Script untuk JS atau framework JS seperti Alpine.js atau Vue.js -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
