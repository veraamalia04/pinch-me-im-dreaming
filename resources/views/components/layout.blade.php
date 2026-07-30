@props([
    'title' => 'Page'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">

    <style>
        body {
            background-image: url('{{ asset('images/background-image.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased text-amber-900">
    <x-flash-msg></x-flash-msg>

    <!-- Navigation Bar (Modern, Sticky, Blur-on-scroll) -->
    <header
        x-data="{ scrolled: false }"
        x-init="scrolled = window.scrollY > 10"
        @scroll.window="scrolled = window.scrollY > 10"
        :class="scrolled
            ? 'bg-white/70 backdrop-blur-xl shadow-lg shadow-amber-900/5 border-b border-amber-900/10'
            : 'bg-transparent border-b border-transparent'"
        class="sticky top-0 z-50 flex justify-between items-center px-6 py-3 transition-all duration-300"
    >

        <!-- Kiri: Logo & Nama Aplikasi -->
        <a href="/" class="flex items-center gap-3 group">
            <div class="p-1.5 rounded-xl transition-all duration-300 group-hover:scale-105 group-hover:bg-amber-900/5 backdrop-blur-sm">
                <img class="h-9 object-contain drop-shadow-md" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo">
            </div>
            <span class="font-extrabold text-lg tracking-wide drop-shadow-sm hidden sm:block text-amber-900">
                {{ Str::upper(config('app.name')) }}
            </span>
        </a>

        <!-- Kanan: Menu Navigasi & Auth -->
        <div class="flex items-center gap-1.5 sm:gap-3">
            @auth
                <!-- Icon Link: Order -->
                <a href="{{ route('page.order.index') }}"
                   title="Order"
                   class="p-2.5 rounded-full text-amber-400 hover:bg-amber-900 hover:text-white transition-all duration-200 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </a>

                <!-- Icon Link: Box -->
                <a href="{{ route('page.box.index') }}"
                   title="Box"
                   class="p-2.5 rounded-full text-amber-400 hover:bg-amber-900 hover:text-white transition-all duration-200 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0-6.75l-3 3m3-3l3 3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </a>

                <!-- Divider tipis -->
                <div class="w-px h-6 bg-amber-900/15 mx-1 hidden sm:block"></div>

                <!-- Dropdown Profile dengan Alpine.js -->
                <div x-data="{ open: false }" class="relative">
                    <!-- Tombol Inisial User -->
                    <button
                        @click="open = !open"
                        @click.outside="open = false"
                        class="h-10 w-10 rounded-full bg-gradient-to-br from-amber-700 to-amber-900 text-white flex items-center justify-center font-bold text-sm shadow-md hover:shadow-lg transition-all duration-200 hover:scale-105 focus:outline-none ring-2 ring-transparent focus:ring-amber-300"
                        title="{{ Auth::user()->name }}"
                    >
                        {{ Auth::user()->initials }}
                    </button>

                    <!-- Menu Dropdown -->
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        class="absolute right-0 mt-3 w-48 bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl border border-amber-900/10 overflow-hidden py-2 z-50"
                        style="display: none;"
                    >
                        <!-- Header Dropdown (Nama User) -->
                        <div class="px-4 py-3 border-b border-amber-900/10">
                            <p class="text-sm font-semibold text-amber-900 truncate">{{ Auth::user()->name }}</p>
                        </div>

                        <div class="px-4 py-3 border-b border-amber-900/10">
                            <a href="{{ route('page.myprofile') }}" class="text-sm font-semibold text-amber-900 truncate">MyProfile</a>
                        </div>



                        <!-- Tombol Logout -->
                        <form action="{{ route('post.logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2.5 mt-1 flex items-center gap-3 text-sm font-semibold text-amber-800 hover:bg-amber-50 hover:text-amber-900 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Tombol Login (Minimalist Icon + Text) -->
                <a href="{{ route('page.login') }}" class="flex items-center gap-2 bg-amber-900 hover:bg-amber-800 text-white px-5 py-2.5 rounded-full font-semibold transition-all duration-300 shadow-sm hover:shadow-md hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span>Login</span>
                </a>
            @endauth
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer>
        <!-- Footer Content -->
    </footer>
</body>
</html>