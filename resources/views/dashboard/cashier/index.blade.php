<x-d-layout title="Cashier">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    Kasir
                </h1>
                <p class="text-slate-500 mt-2 text-sm md:text-base">
                    Kelola transaksi pelanggan dengan cepat dan mudah hari ini.
                </p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Transaksi Hari Ini
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $todayOrders->count() }}
                    </h2>
                </div>
                <div class="p-3 bg-indigo-50 rounded-xl">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Pendapatan
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        Rp {{ number_format($todayEarnings, 0, ',', '.') }}
                    </h2>
                </div>
                <div class="p-3 bg-emerald-50 rounded-xl">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500 mb-1">
                        Pelanggan
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $todayCustomers }}
                    </h2>
                </div>
                <div class="p-3 bg-pink-50 rounded-xl">
                    <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Orders Header -->
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6 mb-6">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                    Daftar Pesanan Aktif
                </h2>
            </div>
        </div>

        <!-- Orders List (Pesanan Aktif) -->
        <div class="space-y-4">
            @foreach ($orders->whereNull('selesai_pada') as $order)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 border border-slate-200 p-4 md:p-6 flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center">
                    
                    <!-- Bagian 1: Profil Pelanggan & Status -->
                    <div class="flex flex-col gap-3 w-full lg:w-3/12">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800">{{ $order->user->name }}</span>
                                <span class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div>
                            @if(strtolower($order->status) === 'dipesan')
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-amber-50 text-amber-600 border border-amber-200">
                                    Menunggu Diproses
                                </span>
                            @elseif(strtolower($order->status) === 'diproses')
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-200">
                                    Sedang Diproses
                                </span>
                            @elseif(strtolower($order->status) === 'dikirim')
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200">
                                    Sedang Dikirim
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-slate-50 text-slate-600 border border-slate-200">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Bagian 2: Rincian Item -->
                    <div class="bg-slate-50/70 rounded-lg p-3 border border-slate-100 w-full lg:w-6/12">
                        <div class="space-y-2">
                            @foreach ($order->details as $detail)
                                <div class="flex justify-between items-start text-sm">
                                    <div class="flex items-start gap-2 pr-4">
                                        <span class="font-bold text-indigo-600 bg-white px-1.5 py-0.5 rounded shadow-sm text-xs">{{ $detail->quantity }}x</span>
                                        <span class="text-slate-700 font-medium">{{ $detail->product->name }}</span>
                                    </div>
                                    <span class="font-semibold text-slate-600 whitespace-nowrap text-xs">
                                        Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Bagian 3: Total & Aksi -->
                    <div class="flex flex-row lg:flex-col justify-between items-center lg:items-end gap-3 w-full lg:w-3/12 border-t lg:border-t-0 border-slate-100 pt-4 lg:pt-0">
                        <div class="text-left lg:text-right">
                            <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-0.5">Total Belanja</p>
                            <p class="text-lg font-black text-slate-800">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                        
                        <div class="shrink-0 w-auto">
                            @if(strtolower($order->status) === 'dipesan')
                                <form action="{{ route('put.dashboard.kasir.order.tandai_diproses', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-xs sm:text-sm transition-colors shadow-sm flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                        Proses
                                    </button>
                                </form>
                            @elseif(strtolower($order->status) === 'diproses')
                                <form action="{{ route('put.dashboard.kasir.order.tandai_dikirim', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg font-semibold text-xs sm:text-sm transition-colors shadow-sm flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Kirim
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
            
            @if($orders->whereNull('selesai_pada')->isEmpty())
                <div class="text-center py-8 text-slate-500 bg-white rounded-xl border border-slate-200 border-dashed">
                    Tidak ada pesanan aktif saat ini.
                </div>
            @endif
        </div>

        <!-- ========================================== -->
        <!-- BAGIAN BARU: Riwayat Pesanan & Filter Date -->
        <!-- ========================================== -->
        
        <div class="mt-16 mb-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                    Riwayat Pesanan
                </h2>
                <p class="text-sm text-slate-500 mt-1">Daftar pesanan yang telah selesai</p>
            </div>
            
            <!-- Filter Pencarian Tanggal -->
            <div class="flex items-center gap-2">
                <div class="relative">
                    <input 
                        type="date" 
                        id="searchDate" 
                        class="bg-white border border-slate-300 text-slate-800 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 shadow-sm"
                    >
                </div>
                <button 
                    id="resetSearchBtn" 
                    class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors border border-slate-200"
                >
                    Reset
                </button>
            </div>
        </div>

        <!-- History Orders List -->
        <div class="space-y-4" id="historyContainer">
            @foreach ($orders->whereNotNull('selesai_pada') as $order)
                <!-- data-date menyimpan tanggal murni untuk di filter oleh JS (Format: YYYY-MM-DD) -->
                <div class="history-item bg-white rounded-xl shadow-sm border border-slate-200 p-4 md:p-6 flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center opacity-75 hover:opacity-100 transition-opacity duration-200"
                     data-date="{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}">
                    
                    <!-- Profil Pelanggan & Status -->
                    <div class="flex flex-col gap-3 w-full lg:w-3/12">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800">{{ $order->user->name }}</span>
                                <span class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                Selesai
                            </span>
                        </div>
                    </div>

                    <!-- Rincian Item -->
                    <div class="bg-slate-50/70 rounded-lg p-3 border border-slate-100 w-full lg:w-6/12">
                        <div class="space-y-2">
                            @foreach ($order->details as $detail)
                                <div class="flex justify-between items-start text-sm">
                                    <div class="flex items-start gap-2 pr-4">
                                        <span class="font-bold text-slate-500 bg-white px-1.5 py-0.5 rounded shadow-sm text-xs">{{ $detail->quantity }}x</span>
                                        <span class="text-slate-600 font-medium">{{ $detail->product->name }}</span>
                                    </div>
                                    <span class="font-semibold text-slate-500 whitespace-nowrap text-xs">
                                        Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex flex-row lg:flex-col justify-between items-center lg:items-end gap-3 w-full lg:w-3/12 border-t lg:border-t-0 border-slate-100 pt-4 lg:pt-0">
                        <div class="text-left lg:text-right">
                            <p class="text-xs text-slate-400 font-medium uppercase tracking-wider mb-0.5">Total Dibayar</p>
                            <p class="text-lg font-black text-slate-700">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach

            <!-- Pesan jika filter tidak menemukan data -->
            <div id="noHistoryMessage" class="hidden text-center py-8 text-slate-500 bg-white rounded-xl border border-slate-200 border-dashed">
                Tidak ada riwayat pesanan pada tanggal yang dipilih.
            </div>
            
            <!-- Pesan jika tidak ada riwayat sama sekali -->
            @if($orders->whereNotNull('selesai_pada')->isEmpty())
                <div class="text-center py-8 text-slate-500 bg-white rounded-xl border border-slate-200 border-dashed">
                    Belum ada riwayat pesanan yang selesai.
                </div>
            @endif
        </div>

    </div>

    <!-- Script Filter Menggunakan Pure JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchDateInput = document.getElementById('searchDate');
            const resetSearchBtn = document.getElementById('resetSearchBtn');
            const historyItems = document.querySelectorAll('.history-item');
            const noHistoryMessage = document.getElementById('noHistoryMessage');

            // Fungsi utama untuk filter
            function filterHistory() {
                const selectedDate = searchDateInput.value;
                let visibleCount = 0;

                historyItems.forEach(function(item) {
                    const itemDate = item.getAttribute('data-date');
                    
                    // Jika tidak ada tanggal yang dipilih ATAU tanggal item sama dengan tanggal filter
                    if (!selectedDate || itemDate === selectedDate) {
                        item.style.display = 'flex'; // menggunakan flex karena tailwind class menggunakan flex-col/lg:flex-row
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Tampilkan atau sembunyikan pesan "Tidak ada data"
                // Hanya dieksekusi jika ada history data di halaman ini
                if (historyItems.length > 0) {
                    if (visibleCount === 0) {
                        noHistoryMessage.classList.remove('hidden');
                    } else {
                        noHistoryMessage.classList.add('hidden');
                    }
                }
            }

            // Event listener saat tanggal diubah
            searchDateInput.addEventListener('change', filterHistory);

            // Event listener untuk tombol reset
            resetSearchBtn.addEventListener('click', function() {
                searchDateInput.value = ''; // Kosongkan input
                filterHistory(); // Jalankan ulang filter untuk menampilkan semua
            });
        });
    </script>
</x-d-layout>