<x-d-layout title="Edit Produk - {{ $product->name }}">
    <div class="max-w-7xl mx-auto pb-12">
        
        <!-- Header Section -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Produk</h1>
                <p class="text-sm text-gray-500 mt-1">Mengelola detail, foto, dan histori harga untuk <span class="font-medium text-blue-600">{{ $product->name }}</span>.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" onclick="history.back()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 text-sm font-medium text-gray-700 shadow-sm transition-all focus:ring-2 focus:ring-gray-200 outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- ================= KOLOM KIRI: FORM PRODUK (2 Kolom) ================= -->
            <div class="lg:col-span-2 space-y-6">
                <form action="{{ route('put.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Card Informasi Dasar -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                            <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Informasi Dasar
                            </h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <x-form.input name="name" value="{{ $product->name }}" label="Nama Produk" />
                            <x-form.input name="deskripsi" value="{{ $product->deskripsi }}" label="Deskripsi Produk" />
                        </div>
                    </div>

                    <!-- Card Media / Foto -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                            <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Media Produk
                            </h3>
                            <span class="text-xs font-medium bg-gray-100 text-gray-500 px-2.5 py-1 rounded-full">JPG, JPEG, PNG</span>
                        </div>
                        
                        <div class="p-6">
                            <!-- Area Upload Baru (Drag & Drop Feel) -->
                            <div class="relative border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 hover:border-blue-300 transition-all p-6 text-center cursor-pointer mb-8" onclick="document.getElementById('foto').click()">
                                <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" class="hidden" onchange="previewImage(event)">
                                <div class="mx-auto flex justify-center items-center w-12 h-12 bg-white rounded-full shadow-sm mb-3">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Klik untuk upload foto baru</p>
                                <p class="text-xs text-gray-500 mt-1">Atau drag and drop file Anda ke sini (Maks 2MB)</p>
                                
                                @error('foto')
                                    <p class="text-red-500 text-sm mt-3 flex items-center justify-center gap-1 bg-red-50 p-2 rounded-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Preview Komparasi Gambar -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                                <!-- Current Photo -->
                                <div class="space-y-3">
                                    <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Foto Saat Ini</label>
                                    <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden bg-white border border-gray-200 shadow-sm flex items-center justify-center group">
                                        @if($product->foto)
                                            <img src="{{ $product->foto_url }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <div class="text-center text-gray-400">
                                                <svg class="mx-auto h-8 w-8 mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                                <p class="text-sm font-medium">Belum ada foto</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- New Photo Preview -->
                                <div class="space-y-3 opacity-50 transition-all duration-300" id="preview-wrapper">
                                    <label class="text-xs font-semibold text-blue-600 uppercase tracking-wider flex items-center gap-2">
                                        <span class="relative flex h-2 w-2 hidden" id="preview-indicator">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                        </span>
                                        Preview Foto Baru
                                    </label>
                                    <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center" id="preview-box">
                                        <img id="foto-preview" src="#" alt="Preview" class="object-cover w-full h-full hidden">
                                        <div id="preview-placeholder" class="text-center text-gray-400">
                                            <svg class="mx-auto h-8 w-8 mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            <p class="text-sm font-medium">Menunggu file...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi Form -->
                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="submit" class="w-full md:w-auto px-8 py-3 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- ================= KOLOM KANAN: HARGA & RIWAYAT (1 Kolom) ================= -->
            <div class="space-y-6">
                
                <!-- Card Manajemen Harga -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-50 bg-green-50/30">
                        <h3 class="text-base font-semibold text-green-700 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Manajemen Harga
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <!-- Current Price Display -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Harga Saat Ini</p>
                            <p class="text-2xl font-bold text-gray-900">
                                {{ $product->prices->sortByDesc('created_at')->first()?->harga_rupiah ?? 'Rp 0' }}
                            </p>
                        </div>

                        <form action="{{ route('post.product.update_harga', $product->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <x-form.input value="{{ $product->current_price }}" name="harga" label="Tetapkan Harga Baru (Rp)" type="number" />
                            
                            <button type="submit" class="w-full justify-center px-4 py-3 text-sm font-bold text-white bg-green-600 rounded-xl hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 transition-all shadow-md flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                Perbarui Harga
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Card Riwayat Harga (Timeline Design) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-[400px]">
                    <div class="px-6 py-5 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Riwayat Perubahan
                        </h3>
                    </div>
                    
                    <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                        @if($product->prices->count() > 0)
                            <div class="relative pl-4 border-l-2 border-gray-100 space-y-6">
                                @foreach ($product->prices->sortByDesc('created_at') as $index => $price)
                                    <div class="relative">
                                        <!-- Timeline Dot -->
                                        <div class="absolute -left-[21px] top-1.5 w-3 h-3 rounded-full ring-4 ring-white {{ $index === 0 ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                                        
                                        <!-- Content -->
                                        <div class="bg-white">
                                            <p class="font-bold text-gray-900 {{ $index === 0 ? 'text-base' : 'text-sm text-gray-600' }}">
                                                {{ $price->harga_rupiah }}
                                            </p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span class="text-xs font-medium text-gray-500">{{ $price->created_at->format('d M Y, H:i') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="h-full flex flex-col items-center justify-center text-center px-4">
                                <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                </div>
                                <p class="text-sm font-medium text-gray-500">Belum ada riwayat harga</p>
                                <p class="text-xs text-gray-400 mt-1">Perubahan harga akan tercatat di sini.</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Script Preview Gambar -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const previewWrapper = document.getElementById('preview-wrapper');
            const previewBox = document.getElementById('preview-box');
            const previewImage = document.getElementById('foto-preview');
            const placeholder = document.getElementById('preview-placeholder');
            const indicator = document.getElementById('preview-indicator');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                    
                    // Style updates
                    previewWrapper.classList.remove('opacity-50');
                    indicator.classList.remove('hidden');
                    previewBox.classList.remove('border-dashed', 'bg-gray-50');
                    previewBox.classList.add('border-solid', 'border-blue-200');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                // Reset to default
                previewImage.src = "#";
                previewImage.classList.add('hidden');
                placeholder.classList.remove('hidden');
                
                previewWrapper.classList.add('opacity-50');
                indicator.classList.add('hidden');
                previewBox.classList.add('border-dashed', 'bg-gray-50');
                previewBox.classList.remove('border-solid', 'border-blue-200');
            }
        }
    </script>
    
    <!-- Optional: Add custom scrollbar styling if not already defined in your app.css -->
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</x-d-layout>