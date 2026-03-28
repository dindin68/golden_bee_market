<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    {{-- 1. Cái div bao ngoài: Chỉ căn giữa khi là trang Login/Register --}}
    <div
        class="min-h-screen bg-gray-100 {{ request()->routeIs('login', 'register') ? 'flex flex-col sm:justify-center items-center pt-6 sm:pt-0' : '' }}">

        {{-- 2. Hiện Navigation: Chỉ hiện khi KHÔNG PHẢI login/register --}}
        @unless (request()->routeIs('login', 'register'))
            <livewire:layout.navigation />
        @else
            {{-- Hiện Logo to ở giữa nếu là trang Login/Register --}}
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-yellow-500" />
                </a>
            </div>
        @endunless

        @if (isset($header))
            <header class="bg-white shadow w-full">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        {{-- 3. Phần nội dung chính (Main): Biến hình tùy theo trang --}}
        <main class="{{ request()->routeIs('login', 'register')
    ? 'w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg'
    : 'w-full' }}">

            {{ $slot }}
        </main>

        {{-- Bà có thể thêm Footer chung của Golden Bee ở đây nhen --}}
    </div>
</body>

</html>