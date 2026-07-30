<x-layout title="{{ config('app.name') }}">
    
    <!-- BUNGKUS BARU: overflow-x-hidden agar web tidak bisa digeser ke kanan -->
    <div class="w-full overflow-x-hidden">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center max-w-7xl mx-auto px-6 py-9">
            
            <!-- Kolom Kiri: Teks -->
            <div class="flex flex-col gap-6 md:gap-8">
                
                <!-- Tags/Badges -->
                <div class="flex flex-wrap gap-3 text-sm font-semibold tracking-wide text-amber-700 uppercase">
                    <span class="bg-amber-100 px-3 py-1 rounded-full">Freshly made</span>
                    <span class="bg-amber-100 px-3 py-1 rounded-full">Melt</span>
                    <span class="bg-amber-100 px-3 py-1 rounded-full">Butter</span>
                </div>

                <!-- Heading -->
                <div class="leading-tight">
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-amber-600">Pinch me,</h1>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-amber-800 mt-2">I'm Dreaming</h2>
                </div>

                <!-- Deskripsi -->
                <p class="text-lg text-orange-700 text-justify leading-relaxed max-w-lg">
                    Say hello to your next sugar craving.
                    Perfect bite-sized pancakes.
                    Melt-in-your-mouth goodness.
                    It looks good, but I promise it tastes even better.
                    Pinch Me, I'm Dreaming
                </p>

                <!-- Tombol CTA -->
                <div>
                    <a href="{{ route('page.menu') }}" 
                       class="inline-block px-8 py-3 bg-amber-400 text-gray-900 font-bold uppercase tracking-wider rounded-full ring-2 ring-amber-400 hover:bg-amber-500 hover:text-white hover:ring-amber-500 transition-all duration-300 shadow-md hover:shadow-lg">
                        Go to menu
                    </a>
                </div>

            </div>

            <div class="flex justify-start relative">
                <img src="{{ asset('images/product-bg.png') }}" 
                     alt="Background {{ config('app.name') }}" 
                     class="w-[100%] md:w-[110%] lg:w-[130%] max-w-none object-contain drop-shadow-xl hover:scale-105 transition-transform duration-500"
                >
            </div>
            
        </div>
        
    </div>
</x-layout>