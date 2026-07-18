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

    <!-- Navigation Bar (Transparan) -->
    <!-- Navigation Bar (Transparan) -->
    <header class="flex justify-between items-center px-8 py-4 bg-transparent">
        
        <!-- Kiri: Logo & Nama Aplikasi -->
        <a href="/" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
            <img class="h-10 object-contain" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo">
            <!-- Menambahkan bg-white/80 (putih transparan) di belakang teks agar tulisan logo juga tetap terbaca -->
            <span class="font-bold text-lg tracking-wide drop-shadow-md px-2 py-1 rounded-md">{{ Str::upper(config('app.name')) }}</span>
        </a>

        <!-- Kanan: Menu Navigasi & Auth -->
        <div class="flex items-center gap-6">
            @auth
    
                <a href="" class="flex items-center gap-2 bg-amber-100 text-amber-900 hover:bg-amber-200 px-4 py-2 rounded-md font-semibold transition-all shadow-md border border-amber-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span class="hidden sm:block">Box</span>
                </a>

                <!-- Profil Bulat (Inisial) -->
                <div 
                    class="h-10 w-10 flex-shrink-0 rounded-full bg-amber-800 text-white flex items-center justify-center font-bold text-sm border-2 border-amber-900 shadow-md" 
                    title="{{ Auth::user()->name }}"
                >
                    {{ Auth::user()->initials }}
                </div>

                <!-- Tombol Logout -->
                <form action="{{ route('post.logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="bg-amber-800 hover:bg-amber-900 text-white px-4 py-2 rounded-md transition-all text-sm font-semibold shadow-md">
                        Logout
                    </button>
                </form>
            @else
                <!-- Tombol Login -->
                <a href="{{ route('page.login') }}" class="bg-amber-800 text-white hover:bg-amber-900 px-6 py-2 rounded-md font-semibold transition-all shadow-md">
                    Login
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