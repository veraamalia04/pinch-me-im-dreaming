<x-layout title="{{ config('app.name') }}">
<section class="max-w-7xl mx-auto px-8">
    <div class="grid lg:grid-cols-2 items-center min-h-[80vh]">
        <div>
            <h1 class="mt-2 text-5xl font-black leading-tight text-amber-900">
                Freshly Made
                <br>
                Kue Cubit
            </h1>     
           <p class="mt-4 text-xl text-amber-800 max-w-xl leading-8">
                Nikmati kue cubit hangat dengan berbagai topping premium
                yang dibuat setiap hari menggunakan bahan berkualitas.
            </p>
            <div class="mt-6 flex gap-5">
                <a href="{{ route('page.menu') }}"
                    class="bg-amber-800 text-white px-15 py-4 rounded-full hover:scale-105 transition">
                    Explore Menu
                </a>
            </div>
            <div class="flex gap-8 mt-6">
                <div>
                    ⭐ <strong>4.9</strong>
                    🍫 <strong>20+ Toppings</strong>
                    🚚 <strong>Fast Delivery</strong>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>

<div class="absolute top-16 right-10 text-3xl">
✨
</div>
<div class="absolute bottom-10 left-5 text-4xl">
🍫
</div>

<div class="hidden lg:block">
    <div class="absolute top-1/2 right-11 -translate-y-1/2 z-20">
        <div class="w-[380px] rounded-3xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl p-8 text-center">
            <span class="inline-block bg-yellow-400 text-amber-900 px-4 py-2 rounded-full font-bold">
                Best Seller
            </span>
            <img
                src="{{ asset('images/logo.png') }}"
                class="w-26 mx-auto mt-6 animate-float">
            <h2 class="mt-6 text-3xl font-bold text-white">
    Chocolate Lava
</h2>
<div class="flex justify-center items-center gap-2 mt-3">
    <span class="text-yellow-400 text-xl">
        ★★★★★
    </span>
    <span class="text-gray-200 text-sm">
        4.9 (2.100 Reviews)
    </span>
</div>
<p class="text-gray-200 mt-3">
    Freshly Baked Everyday
</p>
<div class="mt-6 text-4xl font-extrabold text-yellow-300">
    Rp18.000
</div>
            <button
                class="mt-8 bg-amber-600 hover:bg-amber-700 px-8 py-3 rounded-full text-white">
                Order Now
            </button>
        </div>
    </div>
</div>
</section>
</x-layout>
