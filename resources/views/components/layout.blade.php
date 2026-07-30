@props([
    'title' => 'Page'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <!-- Navbar Landing -->
    <header class="sticky top-0 z-50 bg-transparent">

        <nav class="max-w-7xl mx-auto px-8 py-3 flex items-center justify-between">


            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">

                <img 
                    src="{{ asset('images/logo.png') }}"
                    class="h-10 object-contain group-hover:scale-105 transition"
                    alt="Logo"
                >

                <span class="font-extrabold text-xl text-amber-900">
                    {{ Str::upper(config('app.name')) }}
                </span>

            </a>



            <!-- Menu -->
            <div class="hidden md:flex items-center gap-8 font-semibold text-amber-900">

                <a href="/" 
                   class="hover:text-orange-500 transition">
                    Home
                </a>

                <a href="#menu"
                   class="hover:text-orange-500 transition">
                    Menu
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
                <a href="{{ route('login') }}" class="flex items-center gap-2 bg-amber-900 hover:bg-amber-800 text-white px-5 py-2.5 rounded-full font-semibold transition-all duration-300 shadow-sm hover:shadow-md hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span>Login</span>
                </a>

                <a href="#contact"
                   class="hover:text-orange-500 transition">
                    Contact
                </a>

            </div>



            <!-- Login (tetap seperti sebelumnya) -->
            <div class="flex items-center">

                @auth

                    <a href="{{ route('page.order.index') }}"
                       class="px-5 py-2.5 rounded-full bg-amber-900 
                              text-white font-semibold shadow-sm
                              hover:bg-amber-800 transition">
                        Dashboard
                    </a>


                @else

                    <a href="{{ route('page.login') }}" 
                       class="flex items-center gap-2 bg-amber-900 
                              hover:bg-amber-800 text-white 
                              px-5 py-2.5 rounded-full font-semibold 
                              transition-all duration-300 shadow-sm 
                              hover:shadow-md hover:scale-105">

                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke-width="2" 
                             stroke="currentColor" 
                             class="w-5 h-5">

                            <path stroke-linecap="round" 
                                  stroke-linejoin="round" 
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />

                        </svg>

                        <span>
                            Login
                        </span>

                    </a>

                @endauth

            </div>


        </nav>

    </header>



    <!-- Isi Halaman -->
    <main class="flex-grow">
        {{ $slot }}
    </main>


</body>
</html>