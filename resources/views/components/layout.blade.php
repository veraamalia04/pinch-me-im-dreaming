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
        body{
            background-image: url({{ asset('images/background-image.png') }});
            background-size:cover;
        }
    </style>
</head>
<body>
    <x-flash-msg></x-flash-msg>
    <header class="flex justify-between px-10 pt-4">
        @if (!Auth::check())
            
        <a href="{{ route('page.login') }}">Login</a>
        @else
        <form action="{{ route('post.logout') }}" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        @endif

        <div class="flex gap-2 items-center">
            <span class="font-bold text-white w-28 leading-tight">{{ Str::upper(config('app.name')) }}</span>
            <img class="h-8" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo">
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
    
    </footer>
</body>
</html>