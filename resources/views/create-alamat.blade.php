<x-layout title="Alamat {{ $user->name }}">
    <!-- Background Wrapper dengan sedikit padding agar responsif -->
    <div class="max-w-4xl mx-auto mt-10 mb-16 px-4 sm:px-6 lg:px-8">
        
        <!-- Main Card Container: rounded besar, shadow halus, dan sedikit efek glass -->
        <div class="relative bg-white p-8 sm:p-10 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
            
            <!-- Elemen Dekoratif (Glow di pojok kanan atas) -->
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full blur-3xl opacity-10 pointer-events-none"></div>

            <!-- Header Section -->
            <div class="flex items-start sm:items-center space-x-4 mb-10 pb-6 border-b border-gray-100">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Alamat</h2>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi informasi alamat Anda agar proses pengiriman atau validasi berjalan lancar.</p>
                </div>
            </div>

            <!-- Form Section -->
            <form action="{{ route('post.address.store', Auth::id()) }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- Grup 1: Alamat Jalan (Box Berwarna Halus) -->
                <div class="bg-slate-50/50 p-6 rounded-2xl border border-slate-100 transition-all duration-300 hover:bg-white hover:shadow-md hover:border-blue-100 group">
                    <h3 class="text-sm font-semibold text-slate-700 mb-5 flex items-center">
                        <span class="w-1.5 h-4 bg-blue-500 rounded-full mr-2 group-hover:h-5 transition-all"></span>
                        Jalan & Lokasi Spesifik
                    </h3>
                    
                    <div class="space-y-5">
                        <div class="w-full">
                            <x-form.input name="alamat" label="Alamat Lengkap (Nama Jalan, Gedung, No. Rumah)" />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <x-form.input type="number" name="rt" label="RT (Contoh: 001)" />
                            <x-form.input type="number" name="rw" label="RW (Contoh: 002)" />
                        </div>
                    </div>
                </div>

                <!-- Grup 2: Wilayah Administratif -->
                <div class="bg-slate-50/50 p-6 rounded-2xl border border-slate-100 transition-all duration-300 hover:bg-white hover:shadow-md hover:border-blue-100 group">
                    <h3 class="text-sm font-semibold text-slate-700 mb-5 flex items-center">
                        <span class="w-1.5 h-4 bg-indigo-500 rounded-full mr-2 group-hover:h-5 transition-all"></span>
                        Wilayah Administratif
                    </h3>

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <x-form.input name="kota" label="Kota / Kabupaten" />
                            <x-form.input name="kecamatan" label="Kecamatan" />
                            <x-form.input name="kelurahan" label="Kelurahan / Desa" />
                        </div>
                        <div class="w-full md:w-1/3">
                            <x-form.input name="kode_pos" label="Kode Pos" />
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="group relative inline-flex items-center justify-center px-8 py-3 text-sm font-semibold text-white transition-all duration-300 ease-in-out bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-500 hover:to-indigo-500 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-1 overflow-hidden">
                        <!-- Efek kilap saat hover -->
                        <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black pointer-events-none"></span>
                        <span class="relative flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>