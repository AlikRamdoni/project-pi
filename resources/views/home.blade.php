<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="h-full">

<div x-data="{ isOpen: false, isOpenRegister: false, isOpenLogin: false }">
    <div class="min-h-full">

        <header class="relative">
            <img src="bg-2.jpeg" alt="Restaurant Image" class="w-full h-screen object-cover">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50">

                <div class="mt-40">
                    <button @click="isOpenRegister = true" class="mt-4 px-6 py-3 bg-white bg-opacity-50 text-black font-semibold rounded-md shadow-lg">Daftar atau Login</button>
                </div>
            </div>
        </header>

        <!-- Register Modal -->
        <div x-show="isOpenRegister" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title-register" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-4 mx-auto rounded-lg relative w-full max-w-md">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-700" @click="isOpenRegister = false">
                        &times;
                    </button>

                    <!-- Modal content -->
                    <div class="flex flex-col items-center w-full">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <img class="mx-auto h-10 w-auto" src="logo-reliq.png" alt="Your Company">
                            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Daftar Akun</h2>
                        </div>

                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                            <form class="space-y-6" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div>
                                    <x-input-label for="name" :value="__('Nama')" class="block text-sm font-medium leading-6 text-gray-900">Username</x-input-label>
                                    <div class="mt-2">
                                        <x-text-input id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium leading-6 text-gray-900" />
                                    <div class="mt-2">
                                        <x-text-input id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="password" :value="__('Kata Sandi')" class="block text-sm font-medium leading-6 text-gray-900" />
                                    <div class="mt-2">
                                        <x-text-input id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                type="password"
                                name="password"
                                required autocomplete="new-password" minlength="8" />

                                        
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="block text-sm font-medium leading-6 text-gray-900"/>
                                    
                                    <div class="mt-2">
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full" minlength="8"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />

                    
                                    </div>
                                </div>

                                <div>
                                    <x-primary-button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        {{ __('Daftar') }}
                                    </x-primary-button>
                                </div>
                            </form>

                            <p class="mt-10 text-center text-sm text-gray-500">
                                Sudah memiliki Akun?
                                <a href="#" @click.prevent="isOpenRegister = false; isOpenLogin = true" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk disini</a>
                            </p>
                        </div>
                    </div>
                    <!-- End of modal content -->
                </div>
            </div>
        </div>

        <!-- Login Modal -->
        <div x-show="isOpenLogin" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title-login" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white p-4 mx-auto rounded-lg relative w-full max-w-md">
                    <!-- Close button -->
                    <button class="absolute top-2 right-2 text-gray-700" @click="isOpenLogin = false">
                        &times;
                    </button>

                    <!-- Modal content -->
                    <div class="flex flex-col items-center w-full">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <img class="mx-auto h-10 w-auto" src="logo-reliq.png" alt="Your Company">
                            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Masuk</h2>
                        </div>

                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium leading-6 text-gray-900" />
                                    <div class="mt-2">
                                        <x-text-input id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <x-input-label for="password" :value="__('Kata Sandi')"  class="block text-sm font-medium leading-6 text-gray-900" minlength="8"/>

                    
                                    </div>
                                    <div class="mt-2">
                                        <x-text-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div>
                                    <x-primary-button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        {{ __('Masuk') }}
                                    </x-primary-button>
                                    
                                </div>
                            </form>

                            <p class="mt-10 text-center text-sm text-gray-500">
                                Tidak memiliki Akun?
                                <a href="#" @click.prevent="isOpenLogin = false; isOpenRegister = true" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar disini</a>
                            </p>
                        </div>
                    </div>
                    <!-- End of modal content -->
                </div>
            </div>
        </div>
    </div>

    @if ($errors->get('email') || $errors->get('password') || $errors->get('password_confirmation'))
    <div class="fixed bottom-4 right-4 bg-red-500 text-white p-4 rounded-md shadow-lg">
        <ul>
            @foreach ($errors->get('email') ?? [] as $error)
                <li>{{ $error }}</li>
            @endforeach
            @foreach ($errors->get('password') ?? [] as $error)
                <li>{{ $error }}</li>
            @endforeach
            @foreach ($errors->get('password_confirmation') ?? [] as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

</body>
</html>
