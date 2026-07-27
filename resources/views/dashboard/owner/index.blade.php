<x-d-layout title="Owner">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
        {{-- Header Section --}}
        <div class="flex flex-col lg:flex-row justify-between lg:items-end gap-6 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Owner
                    </h2>
                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-700/10">
                        Owner
                    </span>
                </div>
                <p class="text-slate-500 text-sm md:text-base">
                    Pantau performa toko dan kelola seluruh aktivitas bisnis Anda di sini.
                </p>
            </div>
    
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm px-6 py-4 flex items-center gap-4">
                <div class="h-10 w-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                        Selamat Datang
                    </p>
                    <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                        Owner <span class="animate-wave origin-bottom-right">👋</span>
                    </h3>
                </div>
            </div>
        </div>
    
        {{-- Filter Section --}}
        <div class="mb-8 bg-white p-3 rounded-2xl border border-slate-200 shadow-sm inline-block w-full md:w-auto">
            <form action="" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
                <div class="relative w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    </div>
                    <select name="filter" id="filter" class="w-full sm:w-48 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block pl-10 pr-8 py-2.5 outline-none transition-all cursor-pointer hover:bg-slate-100">
                        <option value="semua">Semua Waktu</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="bulanan">Bulanan</option>
                    </select>
                </div>
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl transition-all duration-200 shadow-sm hover:shadow active:scale-95 flex items-center justify-center gap-2">
                    Terapkan Filter
                </button>
            </form>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    
            {{-- Card 1: Total Penjualan --}}
            <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.11-1.36-3.11-2.92v-.03c0-1.57 1.4-2.57 3.11-2.92V9.3c-.66-.18-1.11-.64-1.11-1.19v-.03c0-.55.45-1.01 1.11-1.19V5h2.67v1.93c1.71.36 3.11 1.36 3.11 2.92v.03c0 1.57-1.4 2.57-3.11 2.92v2.92c.66.18 1.11.64 1.11 1.19v.03c0 .55-.45 1.01-1.11 1.19z"/></svg>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total Penjualan</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-lg font-semibold text-slate-400">Rp</span>
                            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ number_format((float)$totalHargaPenjualan, 0, ',', '.') }}</h2>
                        </div>
                    </div>
                    <div class="p-3 bg-green-50 text-green-600 rounded-xl group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>
    
            {{-- Card 2: Total Produk --}}
            <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-6 relative overflow-hidden">
                 <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Produk Terjual</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $totalProdukTerjual }}</h2>
                        <p class="text-sm font-medium text-blue-600 mt-1">Item Berhasil Terjual</p>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                </div>
            </div>
    
            {{-- Card 3: Total Pelanggan --}}
            <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-6 relative overflow-hidden">
                 <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-orange-600" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total Pelanggan</p>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $totalPembeliUnik }}</h2>
                        <p class="text-sm font-medium text-orange-600 mt-1">Pembeli Unik</p>
                    </div>
                    <div class="p-3 bg-orange-50 text-orange-600 rounded-xl group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
            </div>
    
        </div>
    
        {{-- Riwayat Order List --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
             <div class="mb-6">
                <h3 class="text-lg font-bold text-slate-800">Riwayat Pesanan</h3>
                <p class="text-sm text-slate-500">Daftar pesanan yang telah diselesaikan.</p>
            </div>
            <x-riwayat-order :orders="$ordersDone"></x-riwayat-order>
        </div>
        
    </div>
    
</x-d-layout>