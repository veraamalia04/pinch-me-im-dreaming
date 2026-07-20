<x-d-layout title="stocker">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-10">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Produk</h3>
                    {{-- Modern Badge --}}
                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-700/10">
                        {{ $products->count() }} Produk
                    </span>
                </div>
                <p class="text-base text-slate-500">Kelola stok, harga, dan ketersediaan produk Anda.</p>
            </div>
            
            <div>
                {{-- Primary Button --}}
                <a href="{{ route('page.product.create') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 hover:bg-indigo-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Produk
                </a>
            </div>
        </div>
        {{-- Search --}}
<div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">

    <div class="relative w-full md:w-96">

        <input
            type="text"
            placeholder="Cari produk..."
            class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 outline-none">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="absolute left-4 top-3.5 w-5 h-5 text-slate-400"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"/>

        </svg>

    </div>

    <select
        class="rounded-xl border border-slate-300 bg-white px-4 py-3">

        <option>Semua Kategori</option>
        <option>Kue Cubit</option>
        <option>Bolu</option>

    </select>

</div>

        {{-- Grid Produk --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($products as $product)
                {{-- Product Card --}}
                <div class="group relative bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">

                    {{-- Image Container --}}
                    <div class="aspect-square bg-slate-50 overflow-hidden relative border-b border-slate-100">
                        <img
                            src="{{ $product->foto ? $product->foto_url : 'https://placehold.co/400x400/f8fafc/94a3b8?text=No+Image' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.src='https://placehold.co/400x400/f8fafc/94a3b8?text=No+Image'"
                        >
                        {{-- Overlay Gradient on Hover (Optional, for premium feel) --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    {{-- Card Content --}}
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h4 class="text-lg font-bold text-slate-900 line-clamp-1" title="{{ $product->name }}">
                            {{ $product->name }}
                        </h4>
                        <div class="mt-3">

                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        Ready Stock

                        </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-2 line-clamp-2 min-h-[2.5rem] leading-relaxed">
                            {{ $product->deskripsi ?? 'Belum ada deskripsi untuk produk ini.' }}
                        </p>

                        {{-- Price & Actions Footer --}}
                        <div class="mt-auto pt-5 mt-5 border-t border-slate-100 flex items-center justify-between gap-3">
                            
                            {{-- Price --}}
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-0.5">Harga</span>
                                <span class="text-lg font-extrabold text-emerald-600 truncate">
                                    Rp {{ number_format($product->current_price ?? 0, 0, ',', '.') }}
                                </span>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex items-center gap-1.5 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-300">
                                {{-- Edit Button --}}
                                <a href="{{ route('page.product.edit', ['product' => $product->id]) }}"
                                   class="inline-flex items-center justify-center p-2.5 bg-slate-50 hover:bg-indigo-50 text-slate-400 hover:text-indigo-600 rounded-xl transition-colors duration-200"
                                   title="Edit Produk"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('delete.product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center justify-center p-2.5 bg-slate-50 hover:bg-rose-50 text-slate-400 hover:text-rose-600 rounded-xl transition-colors duration-200"
                                            title="Hapus Produk"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full flex flex-col items-center justify-center py-24 px-4 bg-white border-2 border-dashed border-slate-200 rounded-3xl">
                    <div class="w-20 h-20 bg-slate-50 rounded-2xl flex items-center justify-center mb-5 rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Produk</h4>
                    <p class="text-slate-500 text-center max-w-sm mb-8">Anda belum menambahkan produk apa pun. Mulai kelola inventaris Anda dengan menambahkan produk pertama.</p>
                    
                    <a href="{{ route('page.product.create') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 hover:bg-indigo-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-0.5"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Produk Baru
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-d-layout>