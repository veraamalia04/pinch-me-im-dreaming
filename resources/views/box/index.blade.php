<x-layout title="Keranjang Belanja">
    <!-- Background page disarankan warna krem hangat: bg-[#fdf8f5] atau bg-amber-50 -->
    <div class="max-w-4xl mx-auto px-4 py-8 sm:py-12">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-8">
            <div class="p-3 bg-gradient-to-br from-yellow-100 to-amber-200 rounded-2xl shadow-sm border border-amber-300">
                <svg class="w-6 h-6 text-amber-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-amber-950 tracking-tight drop-shadow-sm">Keranjang Belanja</h1>
        </div>

        <!-- Container Keranjang -->
        <div class="bg-white/90 backdrop-blur-sm shadow-[0_8px_30px_rgb(180,83,9,0.12)] rounded-3xl border-2 border-amber-100 overflow-hidden transition-all">
            
            <div class="divide-y-2 divide-amber-50">
                @php $grandTotal = 0; @endphp

                @forelse ($boxDetails as $detail)
                    @php 
                        $subtotal = $detail->product->price * $detail->quantity;
                        $grandTotal += $subtotal;
                    @endphp

                    <!-- Cart Item -->
                    <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-6 hover:bg-amber-50/60 transition-colors duration-300" id="{{ $detail->id }}">
                        
                        <!-- Product Info -->
                        <div class="flex items-center space-x-5 flex-1">
                            <div class="w-24 h-24 flex-shrink-0 relative group p-1 bg-gradient-to-br from-amber-100 to-orange-100 rounded-2xl">
                                <img src="{{ $detail->product->foto_url }}" alt="{{ $detail->product->name }}" class="w-full h-full object-cover rounded-xl shadow-sm border border-amber-200/50 group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h3 class="text-lg font-bold text-amber-900 line-clamp-2 hover:text-amber-700 transition-colors cursor-pointer">
                                    {{ $detail->product->name }}
                                </h3>
                                <p class="text-orange-600 font-extrabold mt-1 text-lg drop-shadow-sm">
                                    Rp {{ number_format($detail->product->current_price, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-amber-700/70 mt-1 font-semibold">
                                    Subtotal: Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Quantity Control (3D Pill effect) -->
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto mt-2 sm:mt-0">
                            <div class="flex items-center bg-amber-100/50 border-2 border-amber-200 rounded-2xl shadow-inner overflow-hidden p-1 gap-1">
                                <form action="{{ route('post.box.subtract_one_from_box', $detail->id) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center text-amber-800 bg-white shadow-sm border border-amber-200 rounded-xl hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-all focus:outline-none active:scale-95 group">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"></path></svg>
                                    </button>
                                </form>

                                <span class="w-12 h-10 flex items-center justify-center text-amber-950 font-bold text-base">
                                    {{ $detail->quantity }}
                                </span>

                                <form action="{{ route('post.box.increase_one_to_box', $detail->id) }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center text-amber-800 bg-white shadow-sm border border-amber-200 rounded-xl hover:bg-green-50 hover:text-green-600 hover:border-green-200 transition-all focus:outline-none active:scale-95 group">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                        <div class="w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mb-6 shadow-inner border-2 border-white">
                            <svg class="w-12 h-12 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-amber-900 mb-2">Keranjangmu masih kosong</h3>
                        <p class="text-amber-700/80 max-w-sm mb-8 font-medium">Jangan biarkan keranjangmu kelaparan. Yuk, cari kue atau produk menarik lainnya!</p>
                        <a href="/" class="inline-flex items-center justify-center px-8 py-3 text-base font-bold text-white bg-gradient-to-b from-amber-400 to-orange-500 border-b-4 border-orange-600 rounded-xl hover:mt-1 hover:border-b-0 hover:mb-1 transition-all shadow-lg shadow-orange-500/30">
                            Mulai Belanja
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Checkout Section (3D Area) -->
            @if(count($boxDetails) > 0)
                <div class="bg-gradient-to-b from-amber-50 to-orange-50 p-6 sm:p-8 border-t-2 border-amber-200/60 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-[inset_0_4px_6px_-4px_rgba(217,119,6,0.1)]">
                    <div class="w-full sm:w-auto text-center sm:text-left">
                        <p class="text-amber-700 text-sm font-bold uppercase tracking-widest mb-1 drop-shadow-sm">Total Belanja</p>
                        <p class="text-3xl font-extrabold text-amber-950 drop-shadow-sm">
                            Rp {{ number_format($box->total_harga, 0, ',', '.') }}
                        </p>
                    </div>
                    
                    <form action="{{ route('post.order.transfer_box_to_order') }}" method="POST" class="m-0 w-full sm:w-auto">
                        @csrf
                        <!-- 3D Button Style (Kue Cubit Matang) -->
                        <button type="submit" class="w-full sm:w-auto group relative flex items-center justify-center gap-2 bg-gradient-to-b from-yellow-400 to-amber-500 text-amber-950 font-extrabold py-3.5 px-8 rounded-2xl border-b-4 border-amber-700 shadow-xl shadow-amber-600/30 active:border-b-0 active:mt-1 transition-all focus:outline-none focus:ring-4 focus:ring-amber-500/50">
                            <span class="drop-shadow-[0_1px_1px_rgba(255,255,255,0.4)]">Checkout Sekarang</span>
                            <svg class="w-5 h-5 drop-shadow-[0_1px_1px_rgba(255,255,255,0.4)] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-layout>