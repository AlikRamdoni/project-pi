<!DOCTYPE html>
<html lang="en" class="h-full bg-black">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full text-white">

    <div class="min-h-full">

        <x-navbar></x-navbar>

    <div class="container mx-auto py-8">

        <div class="flex flex-col md:flex-row">

            <!-- Address Section -->
            <div class="md:w-1/3 p-4">
                <h2 class="text-3xl font-bold mb-4">Alamat</h2>
                <p class="text-lg">Jl.Villa nusa indah 2,<br>
                    Blok Z9 no.79A,<br>
                    Kec.GunungPutri, Kab.Bogor<br>
                    169169<br>
                    <span class="font-bold">+62-8211909189</span>
                </p>
            </div>

            <!-- Business Hours Section -->
            <div class="md:w-1/3 p-4">
                <h2 class="text-3xl font-bold mb-4">Jadwal</h2>
                <div class="flex flex-col">
                    <p class="text-lg flex justify-between">
                        <span>Senin</span>
                        <span>Closed</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Selasa</span>
                        <span>17:30 - 22:00</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Rabu</span>
                        <span>17:30 - 22:00</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Kamis</span>
                        <span>17:30 - 23:00</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Jumat</span>
                        <span>17:30 - 23:00</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Sabtu</span>
                        <span>17:30 - 23:00</span>
                    </p>
                    <p class="text-lg flex justify-between">
                        <span>Minggu</span>
                        <span>17:30 - 22:00</span>
                    </p>
                </div>
            </div>
            

            <div class="md:w-1/3 p-4">
                <h2 class="text-3xl font-bold mb-4">Lokasi</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d320.106437220346!2d106.97366225400245!3d-6.323869456236989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6993ce6c62623b%3A0x736c326cb3bcb5f5!2sEs%20kepal!5e0!3m2!1sen!2sid!4v1720648967785!5m2!1sen!2sid" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="text-sm mt-2">
                    Temukan saya disini <span class="font-bold">Hati-hati dijalan!.</span>
                </p>
            </div>
            

        </div>
    </div>

</body>
</html>
