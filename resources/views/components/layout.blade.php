<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'menu')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Header -->
<x-header></x-header>

<main class="container mx-auto py-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        {{ $slot }}
    </div>
</main>

</body>

</html>