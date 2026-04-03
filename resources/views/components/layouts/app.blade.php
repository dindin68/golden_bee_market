<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- Kiểm tra xem có phải trang login hoặc register không --}}
@php
    $isAuth = request()->routeIs('login', 'register');
@endphp

<body class="font-sans antialiased {{ $isAuth ? 'bg-black text-slate-200' : 'bg-white text-slate-900' }}">
    <div class="min-h-screen relative overflow-hidden">

        {{-- Chỉ hiển thị các đốm màu (blur) nếu là nền đen (trang login/reg) để tạo hiệu ứng đẹp --}}
        @if($isAuth)
            <div
                class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-blue-500/10 blur-[120px] rounded-full pointer-events-none">
            </div>
            <div
                class="absolute bottom-[10%] right-[-10%] w-[600px] h-[600px] bg-amber-500/5 blur-[150px] rounded-full pointer-events-none">
            </div>
        @endif

        {{-- Navigation --}}
        @unless ($isAuth)
            <livewire:layout.navigation />
        @endunless

        <main class="relative z-0">
            {{ $slot }}
        </main>

    </div>
</body>

</html>