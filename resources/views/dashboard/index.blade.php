<x-d-layout title="Dashboard">
    <div class="max-w-6xl mx-auto px-4 py-8">
        
        <!-- Header Section -->
        <div class="mb-10 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Selamat Datang! {{ Auth::user()->name }}</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Pilih panel peran di bawah ini untuk mengelola sistem.</p>
        </div>

        <!-- Grid Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @can('cashier')
                <!-- Cashier Card -->
                <a href="{{ route('page.dashboard.cashier.index') }}" 
                   class="relative block p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                    
                    <!-- Dekorasi background melingkar saat hover -->
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <!-- Icon Cashier (Calculator) -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Kasir</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Masuk ke panel kasir untuk mengelola transaksi dan pembayaran.</p>
                    </div>
                </a>
            @endcan

            @can('stocker')
                <!-- Stocker Card -->
                <a href="{{ route('page.dashboard.stocker.index') }}" 
                   class="relative block p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                    
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Icon Stocker (Archive) -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Stocker</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Pantau ketersediaan barang, update stok, dan manajemen inventaris.</p>
                    </div>
                </a>
            @endcan

            @can('owner')
                <!-- Owner Card -->
                <a href="{{ route('page.dashboard.owner.index') }}" 
                   class="relative block p-8 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                    
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-purple-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0"></div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                            <!-- Icon Owner (Chart Pie) -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Owner</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Lihat laporan penjualan, analisis data, dan performa bisnis.</p>
                    </div>
                </a>
            @endcan

        </div>
    </div>
</x-d-layout>